<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('activation_info_suppliers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('activation_info_suppliers');
    }
};
