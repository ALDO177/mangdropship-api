<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subscribtions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_role_id')->constrained('role_subscribtions', 'id');
            $table->foreignId('id_role_subs')->constrained('users', 'id');
            $table->string('remember_tokens')->default(Str::random());
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscribtions');
    }
};
