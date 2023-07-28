<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('brand_produk_supliers', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('id_badges')->constrained('badges_umkms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('id_produk')->constrained('produks')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('brand_produk_supliers');
    }
};
