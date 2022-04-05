<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id('id');
            $table->string('promotion_id')->unique();
            $table->string('user_id');
            $table->string('header', 100);
            $table->string('category', 10);
            $table->text('description');
            $table->string('thumbnail');
            $table->string('location');
            $table->string('url');
            $table->integer('payment_id');
            $table->string('audience');
            $table->tinyInteger('active');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
