<?php

namespace  App\Trait\Validator{

    use Faker\Factory;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Validation\Rule;
    use Illuminate\Validation\Rules\File;
    use Illuminate\Validation\Validator as ValidationValidator;

    trait useValidatorMangSeller{

        public function creadentialsStore(array $attributte): ValidationValidator{
            $credentials = Validator::make($attributte, [
                'name_store'   => ['required', 'min:10', 'max:254'],
                'path_store'   => ['required', File::image()->types(['png', 'jpg', 'jpeg', 'web'])
                                  ->max(4*1024)->dimensions(Rule::dimensions()
                                  ->maxWidth(300)->maxHeight(300))],
                'store_status' => ['required']
            ]);
            return $credentials;
        }

        public function creadentialsStatus(array $attribute) : ValidationValidator{
            $credentials = Validator::make($attribute, [
                'status'            => ['required', Rule::in(['open', 'close'])],
                'actived_at_start'  => ['required'],
                'actived_at_start'  => ['required'],
                'id'                => ['required', 'exists:store_statuses,id']
            ]);
            return $credentials;
        }

        public function credentialUpdateAccountBank(array $attribute) : ValidationValidator{
            $credentials = Validator::make($attribute, [
                'account_name'       => ['required'],
                'account_number'     => ['required'],
                'id_account_bank'    => ['required', 'exists:account_banks,id'],
                'id'                 => ['required', 'exists:suplier_account_banks,id']
            ]);
            return $credentials;
        }

        public function credentialsStoreAccountBank(array $attribute){
            $credentials = Validator::make($attribute, [
                'account_name'       => ['required'],
                'account_number'     => ['required', 'unique:suplier_account_banks,account_number'],
                'id_supliers'        => ['required', 'exists:suplliers,id'],
                'id_account_bank'    => ['required', 'exists:account_banks,id'],
            ]);
            return $credentials;
        }

        public function creadentialsStoreCupponsActive(array $attribute, $suplierProduct){

            $idProduct = Rule::in($suplierProduct?->suplierProduk->map(function($values){
                return array_values($values->only(['id_product']))[0];
            }));

            $idCupons  = Rule::in($suplierProduct?->cuponsList->map(function($values){
                return array_values($values->only(['id']))[0];
            }));

            $credentials = Validator::make($attribute, [
                'id_suplliers'     => ['required', 'exists:suplliers,id'],
                'id_cupons'        => ['required', $idCupons],
                'id_product'       => ['required', $idProduct, 'unique:cupons_active_suplier_products,id_product'],
                'time_publish'     => ['required', 'numeric'],
                'max_usage_cupons' => ['required', 'numeric']
            ]);
            return $credentials;
        }
    }
}