<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('password_authentications', function (Blueprint $table) {
            $table->uuid('uuid');
            $table->string('email');
            $table->primary('uuid');
            $table->string('token');
            $table->enum('type', ['reset', 'forgot']);
            $table->timestamp('start_at');
            $table->timestamp('end_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('password_authentications');
    }
};
