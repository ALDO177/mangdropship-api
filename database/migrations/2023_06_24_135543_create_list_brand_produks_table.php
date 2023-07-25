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
            $table->string('name_brand');
            $table->string('path_img');
        });
    }

    public function down()
    {
        Schema::dropIfExists('list_brand_produks');
    }
};
