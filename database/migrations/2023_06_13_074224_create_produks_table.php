<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('product_name', 255);
            $table->string('slugh_produk');
            $table->string('SKU');
            $table->bigInteger('regular_price');
            $table->bigInteger('discount_price');
            $table->integer('quantity');
            $table->string('short_description');
            $table->text('product_description');
            $table->bigInteger('product_weight');
            $table->string('product_note')->nullable();
            $table->boolean('published');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
