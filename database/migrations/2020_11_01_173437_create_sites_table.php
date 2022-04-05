<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('site_id')->unique();
            $table->string('connected_account_id')->nullable();
            $table->enum('service', ['launch-site', 'apply-ek'])->default('launch-site');
            $table->string('site_name')->unique();
            $table->string('site_email')->nullable();
            $table->string('origin_site')->nullable();
            $table->string('page_title')->nullable();
            $table->string('sub_fee')->nullable(); // site subscription fee
            $table->text('page_description')->nullable();
            $table->string('theme_url')->nullable();
            $table->string('site_avatar')->nullable();
            $table->integer('trial_period')->nullable();
            $table->bigInteger('payment_id')->unsigned();
            $table->string('fb_handle')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->enum('allow_upload', [0, 1])->default(0);
            $table->string('instagram_handle')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('payment_id')
                ->references('id')
                ->on('payments')
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
        Schema::dropIfExists('sites');
    }
}