<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mangdropship_access_apis', function (Blueprint $table) {
            $table->uuid('uuid');
            $table->primary('uuid');
            $table->string('name');
            $table->string('email');
            $table->string('access_tokens', 255);
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mangdropship_access_apis');
    }
};
