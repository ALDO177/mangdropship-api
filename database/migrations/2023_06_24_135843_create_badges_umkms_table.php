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
            $table->foreignUuid('id_product')->constrained('produks')->onDelete('cascade')->onUpdate('cascade');
            $table->string('badges_name');
            $table->string('badges_icon')->nullable();
            $table->string('badges_path');
            $table->boolean('publish');
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('badges_umkms');
    }
};
