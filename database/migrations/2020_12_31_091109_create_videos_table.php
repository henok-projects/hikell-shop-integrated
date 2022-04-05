<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_id')->unique();
            $table->string('user_id');
            $table->string('site_id')->nullable(); // nullable for HGT video uploads. they dont need a site.
            $table->string('original_owner');
            $table->enum('allow_reuse', [0, 1])->default(0);
            $table->string('title');
            $table->string('description');
            $table->string('size');
            $table->string('category_id')->nullable();
            $table->string('views')->nullable();
            $table->string('tags')->nullable();
            $table->enum('video_type', ['movie', 'tv_show', 'video'])->default('video');
            $table->string('buy_fee')->nullable(); // for non-subscription/buy fee
            $table->string('rent_fee')->nullable(); // for non-subscription/rent fee
            $table->enum('hgt', [0, 1])->default(0);
            $table->bigInteger('round_id')->unsigned()->nullable();
            $table->string('location');
            $table->string('allowed_countries');
            $table->string('thumbnail');
            // for movies/tv-shows
            $table->integer('season')->nullable();
            $table->integer('episode')->nullable();
            $table->string('actors')->nullable();
            $table->string('written_by')->nullable();
            $table->string('director')->nullable();
            $table->string('producer')->nullable();
            $table->enum('allow_download', [0, 1])->default(0)->nullable();
            $table->enum('made_for_kids', [0, 1])->default(0)->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('original_owner')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('site_id')
                ->references('site_id')
                ->on('sites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('round_id')
                ->references('id')
                ->on('idol_rounds')
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
        Schema::dropIfExists('videos');
    }
}
