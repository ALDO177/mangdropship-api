<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subscribtion_role_users', function (Blueprint $table) {
            $table->id();
            $table->morphs('subs');
            $table->foreignUuid('id_users')->constrained('users');
            $table->timestamp('create_at')->default(now('Asia/jakarta')->format('Y-m-d H:i:s'));
            $table->timestamp('expired_at')->defalut()->now('Asia/jakarta')->format('Y-m-d H:i:s');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscribtion_role_users');
    }
};
