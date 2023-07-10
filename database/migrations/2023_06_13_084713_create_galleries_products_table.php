<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('galleries_products', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('id_product')
                ->constrained('produks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('image_path');
            $table->boolean('image_active');
        });
    }

    public function down()
    {
        Schema::dropIfExists('galleries_products');
    }
};
