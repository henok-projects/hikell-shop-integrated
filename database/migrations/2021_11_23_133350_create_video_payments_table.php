<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_payments', function (Blueprint $table) {
            $table->id();
            $table->string('video_id');
            $table->string('user_id');
            $table->string('payment_id')->unique(); // session_id we get from Stripe/Paypal.
            $table->enum('payment_source', ['stripe', 'paypal']);
            $table->double('amount');
            $table->enum('type', ['buy', 'rent']);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('video_id')
                ->references('video_id')
                ->on('videos')
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
        Schema::dropIfExists('video_payments');
    }
}
