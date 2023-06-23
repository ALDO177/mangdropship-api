<?php

namespace App\Trait\ResponseControl{

    use App\Trait\Help\withoutWreapArray;
    use Illuminate\Database\Eloquent\Model;

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

        public function successAuthenticationWithToken(string $token, int $code = 201 , array $success, array $additional = []){
            $settingSuccess = $this->successSettingLang($success, $code);
            $settingSuccess['token'] = $token;
            return array_merge_recursive($settingSuccess, $additional);
        }
        
        protected function successSettingLang(array $success, int $statusCode) : array{
            $settingsuccess = [];
            $settingsuccess['status_code'] = $statusCode;
            foreach($success as $key => $value){
                $settingsuccess['code_success']     = $key;
                $settingsuccess['message_success']  = $value;
            }
            return $settingsuccess;
        }
    }
}