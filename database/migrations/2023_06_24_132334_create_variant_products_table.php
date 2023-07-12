<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('variant_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_product')->constrained('produks')->onDelete('cascade')->onUpdate('cascade');
            $table->string('variant_type_name');
            $table->string('variant_type_names')->nullable();
            $table->json('variant_options');
            // $table->string('variant_select_name');
            // $table->string('variant_select_names')->nullable();
            // $table->bigInteger('variant_price');
            // $table->bigInteger('variant_quantity');
            // $table->string('sku');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('variant_products');
    }
};
