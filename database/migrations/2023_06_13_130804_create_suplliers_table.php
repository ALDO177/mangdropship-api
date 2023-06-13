<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('suplliers', function (Blueprint $table) {
            $table->foreignId('id_sellers')->constrained('mang_sellers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('id_product')->constrained('produks')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('suplliers');
    }
};
