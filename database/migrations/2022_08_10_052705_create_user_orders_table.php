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
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('product_id')->nullable()->comment('商品ID');
            $table->integer('user_id')->nullable()->commet('訂單擁有者');
            $table->integer('user_info_id')->nullable()->commet('訂單人資訊');
            $table->integer('status')->nullable()->comment('訂單狀態');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_orders');
    }
};
