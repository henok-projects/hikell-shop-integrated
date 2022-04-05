<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->comment('subscriber user ID');
            $table->string('site_id');
            $table->string('video_id')->nullable();
            $table->string('expiration_date')->nullable();
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
        Schema::dropIfExists('subscribers');
    }
}
