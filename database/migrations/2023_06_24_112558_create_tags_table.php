<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('tags_name_product');
            $table->string('slugh_name_product');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tags');
    }
};
