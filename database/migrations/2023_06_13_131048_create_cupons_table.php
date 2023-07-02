<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_suplier')
                ->constrained('suplliers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('code_cupons');
            $table->text('cupon_description');
            $table->bigInteger('discount_value');
            $table->string('discount_type');
            $table->bigInteger('time_usage');
            $table->bigInteger('max_usage');
            $table->timestamp('cupons_start_at');
            $table->timestamp('cupons_end_at');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cupons');
    }
};
