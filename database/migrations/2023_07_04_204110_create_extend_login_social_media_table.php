<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('extend_login_social_media', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('id_sellers')->constrained('mang_sellers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('type')->unique();
            $table->string('provider_id');
            $table->string('access_tokens');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('extend_login_social_media');
    }
};
