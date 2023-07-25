<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('info_shiping_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_product')->constrained('produks')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('heavy_product');
            $table->string('remember_token');
            $table->json('package_size'); // width, long, height
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('info_shiping_products');
    }
};
