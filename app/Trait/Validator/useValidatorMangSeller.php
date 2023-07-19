<?php

namespace  App\Trait\Validator {

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Validation\Rule;
    use Illuminate\Validation\Rules\File;
    use Illuminate\Validation\Validator as ValidationValidator;

    trait useValidatorMangSeller
    {

        public function creadentialsStore(array $attributte): ValidationValidator
        {
            $credentials = Validator::make($attributte, [
                'name_store'   => ['required', 'min:10', 'max:254'],
                'path_store'   => ['required', File::image()->types(['png', 'jpg', 'jpeg', 'web'])
                    ->max(4 * 1024)->dimensions(Rule::dimensions()
                        ->maxWidth(300)->maxHeight(300))],
                'store_status' => ['required']
            ]);
            return $credentials;
        }

        public function creadentialsStatus(array $attribute): ValidationValidator
        {
            $credentials = Validator::make($attribute, [
                'status'            => ['required', Rule::in(['open', 'close'])],
                'actived_at_start'  => ['required'],
                'actived_at_start'  => ['required'],
                'id'                => ['required', 'exists:store_statuses,id']
            ]);
            return $credentials;
        }

        public function credentialUpdateAccountBank(array $attribute): ValidationValidator
        {
            $credentials = Validator::make($attribute, [
                'account_name'       => ['required'],
                'account_number'     => ['required'],
                'id_account_bank'    => ['required', 'exists:account_banks,id'],
                'id'                 => ['required', 'exists:suplier_account_banks,id']
            ]);
            return $credentials;
        }

        public function credentialsStoreAccountBank(array $attribute)
        {
            $credentials = Validator::make($attribute, [
                'account_name'       => ['required'],
                'account_number'     => ['required', 'unique:suplier_account_banks,account_number'],
                'id_supliers'        => ['required', 'exists:suplliers,id'],
                'id_account_bank'    => ['required', 'exists:account_banks,id'],
            ]);
            return $credentials;
        }

        public function creadentialsStoreCupponsActive(array $attribute, $suplierProduct)
        {
            $idProduct = Rule::in($suplierProduct?->suplierProduk->map(function ($values) {
                return array_values($values->only(['id_product']))[0];
            }));
            $idCupons  = Rule::in($suplierProduct?->cuponsList->map(function ($values) {
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

        public function creadentialsLoginProvider(array $attribute)
        {
            $credentials = Validator::make($attribute, [
                'email'       => ['required', 'email', 'exists:mang_sellers,email'],
                'name'        => ['required'],
                'type'        => ['required', 'unique:extend_login_social_media,type'],
                'id_sellers'  => ['required', 'exists:mang_sellers,id']
            ]);
            return $credentials;
        }

        public function credentialsStoreProdukMang(Request $request)
        {
            $credentials = Validator::make($request->all(), [
                    'category_product.category'      => ['required', 'exists:categorys,id'],
                    'category_product.subcategory'   => ['required', 'exists:sub_categorys,id'],
                    'product.product_name'           => ['required', 'unique:produks,product_name', 'min:8', 'max:1024'],
                    'product.regular_price'          => ['required', 'numeric'],
                    'product.discount_price'         => ['required', 'numeric'],
                    'product.quantity'               => ['required', 'numeric'],
                    'product.short_description'      => ['required'],
                    'product.product_description'    => ['required'],
                    'product.product_weight'         => ['required', 'numeric'],
                    'product.product_note'           => ['required'],
                    'variant_product'                => ['required'],
                    'variant_product.*.variant_options.variant_type_name'  => ['required'],
                    'variant_product.*.variant_options.variant_type_price' => ['required', 'numeric'],
                    'variant_product.*.variant_options.variant_quantity'   => ['required', 'numeric', 'min:50'],
                    'tags_product.tags_name_product' =>  ['required', 'min:8'],
                    'galleries_product'              =>  ['required'],
                    'galleries_product.*.image_path' =>  ['required', File::image()->types(['png', 'jpg', 'jpeg', 'webp'])
                        ->max(4 * 1024)->dimensions(Rule::dimensions()
                            ->maxWidth(600)->maxHeight(600))],
                    'video_product.video'  => ['required', File::types(['mp4', 'avi', 'mpeg'])->min(1024)->max(12 * 1024)],
                    'info_shiping_product' => ['required'],
                    'info_shiping_product.heavy'         => ['required', 'numeric'],
                    'info_shiping_product.package_size'  => ['required'],
                    'info_shiping_product.package_size.width'  => ['required', 'numeric'],
                    'info_shiping_product.package_size.long'   => ['required', 'numeric'],
                    'info_shiping_product.package_size.height' => ['required', 'numeric'],
                ], [
                    'variant_product.0.variant_options.variant_type_name.required'      => 'Nama Variant Ke-1 Wajib diisi',
                    'variant_product.1.variant_options.variant_type_name.required'      => 'Nama Variant Ke-2 Wajib diisi',
                    'variant_product.2.variant_options.variant_type_name.required'      => 'Nama Variant Ke-3 Wajib diisi',
                    'variant_product.3.variant_options.variant_type_name.required'      => 'Nama Variant Ke-4 Wajib diisi',
                    'variant_product.4.variant_options.variant_type_name.required'      => 'Nama Variant Ke-5 Wajib diisi',
                    'variant_product.5.variant_options.variant_type_name.required'      => 'Nama Variant Ke-6 Wajib diisi',
                    'variant_product.6.variant_options.variant_type_name.required'      => 'Nama Variant Ke-7 Wajib diisi',
                    'variant_product.7.variant_options.variant_type_name.required'      => 'Nama Variant Ke-8 Wajib diisi',
                    'variant_product.8.variant_options.variant_type_name.required'      => 'Nama Variant Ke-9 Wajib diisi',
                    'variant_product.9.variant_options.variant_type_name.required'      => 'Nama Variant Ke-10 Wajib diisi',
                    'variant_product.0.variant_options.variant_type_price.required'     => 'Price Variant Ke-1 Wajib diisi',
                    'variant_product.1.variant_options.variant_type_price.required'     => 'Price Variant Ke-2 Wajib diisi',
                    'variant_product.2.variant_options.variant_type_price.required'     => 'Price Variant Ke-3 Wajib diisi',
                    'variant_product.3.variant_options.variant_type_price.required'     => 'Price Variant Ke-4 Wajib diisi',
                    'variant_product.4.variant_options.variant_type_price.required'     => 'Price Variant Ke-5 Wajib diisi',
                    'variant_product.5.variant_options.variant_type_price.required'     => 'Price Variant Ke-6 Wajib diisi',
                    'variant_product.6.variant_options.variant_type_price.required'     => 'Price Variant Ke-7 Wajib diisi',
                    'variant_product.7.variant_options.variant_type_price.required'     => 'Price Variant Ke-8 Wajib diisi',
                    'variant_product.8.variant_options.variant_type_price.required'     => 'Price Variant Ke-9 Wajib diisi',
                    'variant_product.9.variant_options.variant_type_price.required'     => 'Price Variant Ke-10 Wajib diisi',
                    'variant_product.9.variant_options.variant_type_price.numeric'      => 'Price Variant Ke-1 Wajib berupa digit',
                    'variant_product.0.variant_options.variant_type_price.numeric'      => 'Price Variant Ke-1 Wajib berupa digit',
                    'variant_product.1.variant_options.variant_type_price.numeric'      => 'Price Variant Ke-2 Wajib berupa digit',
                    'variant_product.2.variant_options.variant_type_price.numeric'      => 'Price Variant Ke-3 Wajib berupa digit',
                    'variant_product.3.variant_options.variant_type_price.numeric'      => 'Price Variant Ke-4 Wajib berupa digit',
                    'variant_product.4.variant_options.variant_type_price.numeric'      => 'Price Variant Ke-5 Wajib berupa digit',
                    'variant_product.5.variant_options.variant_type_price.numeric'      => 'Price Variant Ke-6 Wajib berupa digit',
                    'variant_product.6.variant_options.variant_type_price.numeric'      => 'Price Variant Ke-7 Wajib berupa digit',
                    'variant_product.7.variant_options.variant_type_price.numeric'      => 'Price Variant Ke-8 Wajib berupa digit',
                    'variant_product.8.variant_options.variant_type_price.numeric'      => 'Price Variant Ke-9 Wajib berupa digit',
                    'variant_product.9.variant_options.variant_type_price.numeric'      => 'Price Variant Ke-10 Wajib berupa digit',
                    'variant_product.0.variant_options.variant_quantity.required'       => 'Stok Variant Ke-1 Wajib diisi',
                    'variant_product.1.variant_options.variant_quantity.required'       => 'Stok Variant Ke-2 Wajib diisi',
                    'variant_product.2.variant_options.variant_quantity.required'       => 'Stok Variant Ke-3 Wajib diisi',
                    'variant_product.3.variant_options.variant_quantity.required'       => 'Stok Variant Ke-4 Wajib diisi',
                    'variant_product.4.variant_options.variant_quantity.required'       => 'Stok Variant Ke-5 Wajib diisi',
                    'variant_product.5.variant_options.variant_quantity.required'       => 'Stok Variant Ke-6 Wajib diisi',
                    'variant_product.6.variant_options.variant_quantity.required'       => 'Stok Variant Ke-7 Wajib diisi',
                    'variant_product.7.variant_options.variant_quantity.required'       => 'Stok Variant Ke-8 Wajib diisi',
                    'variant_product.8.variant_options.variant_quantity.required'       => 'Stok Variant Ke-9 Wajib diisi',
                    'variant_product.9.variant_options.variant_quantity.required'       => 'Stok Variant Ke-10 Wajib diisi',
                    'variant_product.0.variant_options.variant_quantity.numeric'        => 'Stok Variant Ke-1 Wajib berupa digit',
                    'variant_product.1.variant_options.variant_quantity.numeric'        => 'Stok Variant Ke-2 Wajib berupa digit',
                    'variant_product.2.variant_options.variant_quantity.numeric'  => 'Stok Variant Ke-3 Wajib berupa digit',
                    'variant_product.3.variant_options.variant_quantity.numeric'  => 'Stok Variant Ke-4 Wajib berupa digit',
                    'variant_product.4.variant_options.variant_quantity.numeric'  => 'Stok Variant Ke-5 Wajib berupa digit',
                    'variant_product.5.variant_options.variant_quantity.numeric'  => 'Stok Variant Ke-6 Wajib berupa digit',
                    'variant_product.6.variant_options.variant_quantity.numeric'  => 'Stok Variant Ke-7 Wajib berupa digit',
                    'variant_product.7.variant_options.variant_quantity.numeric'  => 'Stok Variant Ke-8 Wajib berupa digit',
                    'variant_product.8.variant_options.variant_quantity.numeric'  => 'Stok Variant Ke-9 Wajib berupa digit',
                    'variant_product.9.variant_options.variant_quantity.numeric'  => 'Stok Variant Ke-10 Wajib berupa digit',
                    'variant_product.0.variant_options.variant_quantity.min'      => 'Stok Variant Ke-1 harus minimal 50',
                    'variant_product.1.variant_options.variant_quantity.min'      => 'Stok Variant Ke-2 harus minimal 50',
                    'variant_product.2.variant_options.variant_quantity.min'      => 'Stok Variant Ke-3 harus minimal 50',
                    'variant_product.3.variant_options.variant_quantity.min'      => 'Stok Variant Ke-4 harus minimal 50',
                    'variant_product.4.variant_options.variant_quantity.min'      => 'Stok Variant Ke-5 harus minimal 50',
                    'variant_product.5.variant_options.variant_quantity.min'      => 'Stok Variant Ke-6 harus minimal 50',
                    'variant_product.6.variant_options.variant_quantity.min'      => 'Stok Variant Ke-7 harus minimal 50',
                    'variant_product.7.variant_options.variant_quantity.min'      => 'Stok Variant Ke-8 harus minimal 50',
                    'variant_product.8.variant_options.variant_quantity.min'      => 'Stok Variant Ke-9 harus minimal 50',
                    'variant_product.9.variant_options.variant_quantity.min'      => 'Stok Variant Ke-10 harus minimal 50',
            ]);
            return $credentials;
        }
    }
}
