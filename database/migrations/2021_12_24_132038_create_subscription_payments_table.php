<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_payments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->comment('subscriber user ID');
            $table->string('site_id');
            $table->double('amount');
            $table->string('service')->default('subscription');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('user_id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        $table->foreign('site_id')
            ->references('site_id')
            ->on('sites')
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
        Schema::dropIfExists('subscription_payments');
    }
}
