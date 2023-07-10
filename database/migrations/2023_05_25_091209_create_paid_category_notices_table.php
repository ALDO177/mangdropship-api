<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paid_category_notices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paid_category')->constrained('paid_notice_mang_accounts');
            $table->bigInteger('paid_price');
            $table->text('data');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('paid_category_notices');
    }
};
