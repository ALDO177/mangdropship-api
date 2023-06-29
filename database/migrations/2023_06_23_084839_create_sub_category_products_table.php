<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('sub_category_products', function (Blueprint $table) {
            $table->foreignUuid('id_sub_category')->constrained('sub_categorys');
            $table->foreignUuid('id_product')->constrained('produks');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sub_category_products');
    }
};
