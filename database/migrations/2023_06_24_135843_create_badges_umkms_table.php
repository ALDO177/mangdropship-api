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
            $table->foreignUuid('id_suplier')->constrained('suplliers')->onDelete('cascade')->onUpdate('cascade');
            $table->morphs('badges');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('badges_umkms');
    }
};
