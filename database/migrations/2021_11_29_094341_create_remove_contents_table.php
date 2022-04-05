<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemoveContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remove_contents', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->enum('category',['videos','referrals','books','podcasts','sites']);
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
            $table->timestamp('removed_at')->useCurrent();

            $table->engine ="InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remove_contents');
    }
}
