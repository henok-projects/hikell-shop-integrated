<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_status', function (Blueprint $table) {
            $table->id('id');
            $table->string('promotion_id');
            $table->enum('type', ['48', '24', '20', '16', '12', '8']);
            $table->date('today');
            $table->date('start_at');
            $table->date('end_at');
            $table->tinyInteger('status')->default('1')->comment('0-stop,1-start');

            $table->foreign('promotion_id')
                ->references('promotion_id')
                ->on('promotions')
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
        Schema::dropIfExists('promotion_statuses');
    }
}
