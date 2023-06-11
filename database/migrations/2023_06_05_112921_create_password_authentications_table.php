<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('password_authentications', function (Blueprint $table) {
            $table->softDeletes();
            $table->uuid('uuid');
            $table->bigInteger('id_verify');
            $table->string('email');
            $table->primary('uuid');
            $table->string('token');
            $table->enum('type', ['reset', 'forgot']);
            $table->enum('status', ['admins', 'mangseller', 'dropship']);
            $table->timestamp('start_at');
            $table->timestamp('end_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('password_authentications');
    }
};
