<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cupons_active_suplier_products', function (Blueprint $table) {
            $table->foreignUuid('id_suplliers')
                ->constrained('suplliers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignUuid('id_cupons')
                ->constrained('cupons')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignUuid('id_product')
                ->constrained('produks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('time_publish');
            $table->bigInteger('max_usage_cupons');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cupons_active_suplier_products');
    }
};
