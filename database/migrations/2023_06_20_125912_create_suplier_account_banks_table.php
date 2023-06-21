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
        Schema::create('suplier_account_banks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('account_name');
            $table->string('account_number');
            $table->foreignUuid('id_supliers')->constrained('suplliers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('id_account_bank')->constrained('account_banks')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('suplier_account_banks');
    }
};
