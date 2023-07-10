<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('selers_history_auths', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('info_messages');
            $table->json('data');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('selers_history_auths');
    }
};
