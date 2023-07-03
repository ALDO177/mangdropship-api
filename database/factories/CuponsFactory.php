<?php

namespace Database\Factories;

use App\Models\Supllier;
use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Factories\Factory;

class CuponsFactory extends Factory
{
    public function definition()
    {  
        $DateTimes = now()->format('Y-m-d H:i:s');
        return [
            'id_suplier'        => $this->faker->randomElement(Supllier::all())['id'],
            'cupon_description' => $this->faker->text(100),
            'discount_value'    => random_int(0, 100),
            'discount_type'     => $this->faker->randomElement(['MANG-G-33', 'MANG-G-22', 'MANG-A-55']),
            'time_usage'        => strtotime($DateTimes),
            'max_usage'         => random_int(10, 100),
            'cupons_start_at'   => $this->dateConfig('now'),
            'cupons_end_at'     => $this->dateConfig('now +2 days')
        ];
    }
    
    protected function dateConfig(string $time) : string{
        return (new DateTime($time, new DateTimeZone('Asia/jakarta')))
                ->format('Y-m-d H:i:s');
    }
}
