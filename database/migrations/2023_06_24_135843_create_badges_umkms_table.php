<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('badges_umkms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name_brand');
            $table->foreignId('id_list_brand')->constrained('list_brand_produks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('id_product')->constrained('produks')->onDelete('cascade')->onUpdate('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('badges_umkms');
    }
};
