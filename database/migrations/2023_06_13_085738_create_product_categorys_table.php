<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_categorys', function (Blueprint $table) {
            $table->foreignUuid('category_id')->constrained('sub_categorys');
            $table->foreignUuid('produks_id')->constrained('produks');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_categorys');
    }
};
