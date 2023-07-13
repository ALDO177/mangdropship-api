<?php

namespace  App\Trait\Validator{

    use Faker\Factory;
    use Illuminate\Http\Request;
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

        public function creadentialsLoginProvider(array $attribute){
            $credentials = Validator::make($attribute, [
                'email'       => ['required', 'email', 'exists:mang_sellers,email'],
                'name'        => ['required'],
                'type'        => ['required', 'unique:extend_login_social_media,type'],
                'id_sellers'  => ['required', 'exists:mang_sellers,id']
            ]);
            return $credentials;
        }

        public function credentialsStoreProdukMang(Request $request){

            $credentials = Validator::make($request->all(), [
                'category_product.category'      => ['required', 'exists:categorys,id'],
                'category_product.subcategory'   => ['required', 'exists:sub_categorys,id'],
                'product.product_name'           => ['required', 'unique:produks,product_name', 'min:8', 'max:1024'],
                'product.regular_price'          => ['required'],
                'product.discount_price'         => ['required'],
                'product.quantity'               => ['required'],
                'product.short_description'      => ['required'],
                'product.product_description'    => ['required'],
                'product.product_weight'         => ['required'],
                'product.product_note'           => ['required'],
                'variant_product'                => ['required'],
                'variant_product.*.variant_options.variant_type_name'  => ['required'],
                'variant_product.*.variant_options.variant_price'      => ['required'],
                'variant_product.*.variant_options.variant_quantity'   => ['required'],
                'tags_product.tags_name_product' =>  ['required', 'min:8'],
                'galleries_product' => ['required'],
                'galleries_product.*.image_path' =>  ['required', 
                  File::image()->types(['png', 'jpg', 'jpeg', 'webp'])
                    ->max(4*1024)
                    ->dimensions(Rule::dimensions()
                    ->maxWidth(600)
                    ->maxHeight(600))],
                'video_product.video' => ['required', File::types(['mp4', 'avi', 'mpeg'])
                        ->min(1024)
                        ->max(12 * 1024),]
            ]);
            return $credentials;
        }
    }
}