<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('option_garansi_produks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignUuid('id_product')->constrained('produks')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('count_days');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('option_garansi_produks');
    }
};
