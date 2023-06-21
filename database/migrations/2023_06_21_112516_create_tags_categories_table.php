<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tags_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->morphs('tags_category');
            $table->string('code_access');
            $table->boolean('publish');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tags_categories');
    }
};
