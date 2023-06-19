<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('store_payment_banks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('altern_code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('store_payment_banks');
    }
};
