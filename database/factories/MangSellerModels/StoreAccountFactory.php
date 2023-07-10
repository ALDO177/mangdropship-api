<?php

namespace Database\Factories\MangSellerModels;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MangSellerModels\StoreAccount>
 */
class StoreAccountFactory extends Factory
{
    public function definition()
    {
        return [
            'name_company'           => $this->faker->company(),
            'sales_category_field'   => $this->faker->randomElement(['obat-obatan', 'sparepart-mobil', 'baju', 'celana']),
            'sales_scategorys_field' => $this->faker->randomElement(['obat-kepala-pusing', 'ban-mobil', 'kaos-hitam-pria', 'celana-pendek-pria']),
            'company_info'           => $this->faker->text(random_int(100, 200)),
        ];
    }
}
