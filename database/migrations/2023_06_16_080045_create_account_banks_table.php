<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('account_banks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type_bank', 255);
            $table->string('thumbnail');
            $table->string('code_access', 255);
            $table->json('more')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('account_banks');
    }
};
