<?php

namespace App\Trait\ResponseControl{

    use App\Trait\Help\withoutWreapArray;

    trait useError{
        use withoutWreapArray;

        public function errAuthWithoutValidation(int $statusCode, array $error){
             $errorSetting = $this->errorSettingLang($error, $statusCode);
             return array_merge_recursive(
                $errorSetting
            );
        }
        
        public function errAuthWithValidation(int $statusCode = 401, array $error, array $messageValidation){
            return array_merge_recursive(
                $this->errorSettingLang($error, $statusCode),
                $this->wreap($messageValidation)
            );
        }

        public function errValidation(int $statusCode, array $error, array $messagesValidations): array{
            $errorSetting = $this->errorSettingLang($error, $statusCode);
            return array_merge_recursive($errorSetting, $this->wreap($messagesValidations));
        }

        public function errGlobalResponse(int $statusCode, array $error){
            return $this->errorSettingLang($error, $statusCode);
        }
        
        public function errGlobalResponseAdditional(int $statusCode, array $error, array $array = []){
            return array_merge_recursive(
                $this->errorSettingLang($error, $statusCode),
                $array
            );
        }

        protected function errorSettingLang(array $error, int $statusCode) : array{
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