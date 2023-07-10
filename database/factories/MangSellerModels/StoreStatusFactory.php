<?php

namespace Database\Factories\MangSellerModels;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MangSellerModels\StoreStatus>
 */
class StoreStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dateTimes = new DateTime('now +7 days');
        
        return [
            'status'           => 'open',
            'actived_at_start' => now()->format('Y-m-d H:i:s'),
            'actived_at_end'   => $dateTimes->format('Y-m-d H:i:s')
        ];
    }
}
