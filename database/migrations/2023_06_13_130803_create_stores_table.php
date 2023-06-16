<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name_store');
            $table->string('slugh_store');
            $table->string('path_store');
            $table->boolean('store_status');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
