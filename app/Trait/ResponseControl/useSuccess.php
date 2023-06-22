<?php

namespace App\Trait\ResponseControl{

    use App\Trait\Help\withoutWreapArray;

    trait useSuccess{

        use withoutWreapArray;
        public function successGlobalResponse(int $statusCode = 201, array $langSuccess){
            $resSuccess = $this->successSettingLang($langSuccess, $statusCode);
            return array_merge_recursive($resSuccess);
        }

        public function successGlobalResponseAdditional(int $statusCode = 201, array $langSuccess, array $additional = []){
            $resSuccess = $this->successSettingLang($langSuccess, $statusCode);
            return array_merge_recursive(
                $resSuccess,
                $additional
            );
        }

        protected function successSettingLang(array $error, int $statusCode) : array{
            $settingError = [];
            $settingError['status_code'] = $statusCode;
            foreach($error as $key => $value){
                $settingError['code_error']     = $key;
                $settingError['message_error']  = $value;
            }
            return $settingError;
        }
    }
}