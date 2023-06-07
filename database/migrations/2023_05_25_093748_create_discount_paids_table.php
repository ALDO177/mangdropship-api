<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('discount_paids', function (Blueprint $table) {
            $table->softDeletes();
            $table->id();
            $table->bigInteger('paid_discount');
            $table->timestamp('create_at_disc');
            $table->timestamp('expire_at_disc');
            $table->foreignId('offers_id')->constrained('paid_category_notices');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('discount_paids');
    }
};
