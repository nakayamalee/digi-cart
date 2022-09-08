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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('user_id')->nullable()->commet('訂單擁有者');
            $table->string('user_address')->nullable()->comment('寄送地址');
            $table->integer('delivery_type')->nullable()->comment('運送方式');
            $table->integer('pay_type')->nullable()->comment('寄送地址');
            $table->string('order_subtotal')->nullable()->comment('訂單總額');
            $table->string('order_id')->nullable()->comment('訂單編號');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
};
