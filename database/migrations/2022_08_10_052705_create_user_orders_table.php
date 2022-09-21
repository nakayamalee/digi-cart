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
            $table->string('product_id')->nullable()->comment('商品ID');
            $table->string('product_price')->nullable()->comment('商品價格');
            $table->string('product_qty')->nullable()->comment('商品數量');
            $table->bigInteger('user_info_id')->nullable()->commet('訂單人資訊');
            
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
