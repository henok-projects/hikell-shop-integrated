<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHgtvotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hgt_votes', function (Blueprint $table) {
            $table->id();
            $table->string("video_id");
            $table->string("user_id");
            $table->enum("type", [0, 1])->default(0);
        $table->string("total_vote");
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
        Schema::dropIfExists('hgtvotes');
    }
}