<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('videos_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_product')->constrained('produks')->onDelete('cascade')->onUpdate('cascade');
            $table->string('video_name')->nullable();
            $table->text('video_description')->nullable();
            $table->string('video_path');
            $table->boolean('video_status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('videos_products');
    }
};
