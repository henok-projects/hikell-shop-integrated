<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('payment_id')->unique(); // session_id we get from Stripe.
            $table->double('amount');
            $table->bigInteger('plan_id')->unsigned()->nullable();
            $table->enum('service', ['launch-site', 'apply-ek', 'promote', 'goldenbuzzer', 'enrollment', 'storage_upgrade']);
            $table->enum('payment_source', ['stripe', 'paypal']);
            $table->string('metadata')->nullable(); // for storing potentially useful metadata of payment.
            $table->timestamps();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('plan_id')
                ->references('id')
                ->on('payment_plans')
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
        Schema::dropIfExists('payments');
    }
}