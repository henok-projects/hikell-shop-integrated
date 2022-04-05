<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
           $table->id();
            $table->string('product_id');
            $table->string('order_id');
            $table->decimal('price');
            $table->integer('qty');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('line1');
            $table->string('line2')->nullable();
            $table->string('mobile');
            $table->string('city');
            $table->string('country');
            $table->string('province');
            $table->string('zipcode');
            $table->timestamps();
           $table->foreign('product_id')->references('product_id')->on('stocks')->onDelete('cascade');
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippings');
    }
}
