<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('galleries_variant_products', function (Blueprint $table) {
            $table->foreignUuid('id_variant')->constrained('variant_products')->onDelete('cascade')->onUpdate('cascade');
            $table->string('extension');
            $table->string('path');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('galleries_variant_products');
    }
};
