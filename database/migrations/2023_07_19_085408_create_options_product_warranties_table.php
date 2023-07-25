<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('options_product_warranties', function (Blueprint $table) {
            $table->id();
            $table->string('name_warranty',255);
            $table->bigInteger('time_to_days');
        });
    }

    public function down()
    {
        Schema::dropIfExists('options_product_warranties');
    }
};
