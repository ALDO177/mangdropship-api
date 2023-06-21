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
        Schema::create('store_statuses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('status', ['open', 'close']);
            $table->timestamp('actived_at_start');
            $table->timestamp('actived_at_end');
        });
    }

    public function down()
    {
        Schema::dropIfExists('store_statuses');
    }
};
