<?php

namespace App\Trait\Help{

    use Illuminate\Support\Collection;

    trait useHelpAccountBank{

        public function handleSelfUpdate(Collection $data, $id){
            $dataCollection = [];
            $keyId = $data->map(function($bank) use($dataCollection){
                $dataCollection['id'] = $bank->id;
                return $dataCollection;
            })->filter(function($dataId) use($id){
                return $dataId['id'] === $id;
            })->values();
            return $keyId;
        }
    }
}