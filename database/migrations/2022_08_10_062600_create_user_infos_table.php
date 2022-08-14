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
            $table->string('user_address')->nullable()->comment('寄送地址');
            $table->integer('delivery_type')->nullable()->comment('運送方式');
            $table->integer('pay_type')->nullable()->comment('寄送地址');
            $table->integer('order_id')->nullable()->comment('訂單編號');
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
