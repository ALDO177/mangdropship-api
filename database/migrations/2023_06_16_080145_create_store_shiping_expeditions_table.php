<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('store_shiping_expeditions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('city');
            $table->string('regency');
            $table->string('subdistrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('store_shiping_expeditions');
    }
};
