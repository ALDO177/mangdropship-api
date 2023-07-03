<?php

namespace App\Casts\MangsellerCasts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class OptionsDataCupons{
    public bool $status = true;
    public $message  = null;
}

class CuponsCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        $options = new OptionsDataCupons;
        $array   = [];
        $expired = strtotime($attributes['cupons_end_at']);
        $today   = strtotime('today midnight');

        if($today >= $expired){
           $array['cupons_end_at'] = 'Cupons Expired';
        }

        if($attributes['max_usage'] < 1){
            $array['max_usage'] = 'Cupons use Limiter';
        }

        if(count($array) > 0){
            $options->status  = false;
            $options->message = $array;
        }
        
        return $options;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return ['name' => 'Aldo Ratmawan'];
    }
}
