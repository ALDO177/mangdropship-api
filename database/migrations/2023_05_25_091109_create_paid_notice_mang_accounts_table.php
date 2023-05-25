<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('paid_notice_mang_accounts', function (Blueprint $table) {
            $table->id();
            $table->enum('paid_category_type', ['ECONOMIAL', 'PREMIUM', 'PRO'])->unique();
            $table->string('id_use_paid');
        });
    }

    public function down()
    {
        Schema::dropIfExists('paid_notice_mang_accounts');
    }
};
