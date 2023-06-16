<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('store_information', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('id_store')->constrained('stores');
            $table->foreignUuid('id_status')->constrained('store_statuses');
            $table->foreignUuid('id_store_account')->constrained('store_accounts');
            $table->foreignUuid('id_store_payment')->constrained('store_payment_banks');
            $table->foreignUuid('id_store_expedition')->constrained('store_shiping_expeditions');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('store_information');
    }
};
