<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('list_brand_produks', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('id_suplier')->constrained('suplliers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('merk_name');
            $table->string('type');
            $table->boolean('status');
            $table->enum('position', ['top', 'bottom']);
            $table->string('path');
        });
    }

    public function down()
    {
        Schema::dropIfExists('list_brand_produks');
    }
};
