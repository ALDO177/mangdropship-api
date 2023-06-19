<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('suplier_account_banks', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->string('account_number');
            $table->foreignUuid('id_store_account_bank')->constrained('store_payment_banks');
            $table->foreignUuid('id_account_bank')->constrained('account_banks');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('suplier_account_banks');
    }
};
