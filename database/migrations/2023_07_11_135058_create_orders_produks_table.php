<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('orders_produks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_supliers')->constrained('suplliers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('id_produk')->constrained('produks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('token_order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders_produks');
    }
};
