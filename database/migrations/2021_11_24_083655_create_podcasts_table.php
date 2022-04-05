<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcasts', function (Blueprint $table) {

            $table->id('id');
            $table->string('podcast_id',15)->unique();
            $table->string('user_id');
            $table->string('title', 100);//change
            $table->text('description');//change
            $table->string('publish_date')->nullable();
            $table->integer('episode_number');
            $table->string('thumbnail');//change
            $table->string('location');
            $table->string('tags')->nullable();
            $table->string('size');
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
        Schema::dropIfExists('podcasts');
    }
}
