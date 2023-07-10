<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sub_categorys', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('id_category')->constrained('categorys');
            $table->string('sub_category_name', 255);
            $table->string('slugh_sub_category_name', 255);
            $table->text('icons')->nullable();
            $table->string('token_access_code');
            $table->string('path')->nullable();
            $table->boolean('type_publish');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sub_categorys');
    }
};
