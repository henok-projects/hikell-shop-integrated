<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteTrialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_trial', function (Blueprint $table) {
            $table->id();
            $table->string('site_id');
            $table->string('user_id');
            $table->timestamp('trial_end');
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
        Schema::dropIfExists('site_trial');
    }
}