<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categorys', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->text('category_description');
            $table->string('category_slugh');
            $table->text('icon')->nullable();
            $table->text('image_path');
            $table->boolean('active');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('categorys');
    }
};
