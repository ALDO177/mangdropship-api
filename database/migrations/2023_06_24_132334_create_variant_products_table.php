<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('variant_products', function (Blueprint $table) {
             $table->foreignUuid('id_variant')->constrained('variant_values');
             $table->foreignUuid('id_product')->constrained('produks');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('variant_products');
    }
};
