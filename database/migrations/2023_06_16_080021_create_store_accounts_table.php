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
        Schema::create('store_accounts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name_company');
            $table->string('sales_category_field');
            $table->string('sales_scategorys_field');
            $table->text('company_info');
            $table->string('resi_company')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_accounts');
    }
};
