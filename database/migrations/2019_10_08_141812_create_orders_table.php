<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_seller')->nullable();
            $table->unsignedInteger('user_buy')->nullable();
            $table->unsignedInteger('service_id')->nullable();
            $table->integer('status')->default(1);

            $table->foreign('user_seller')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('user_buy')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
