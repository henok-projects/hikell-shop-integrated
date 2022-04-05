<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemoveUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remove_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('gender', ['m', 'f']);
            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();
            $table->string('birth_date')->nullable();
            $table->enum('admin', ['0', '1'])->default('0');
            $table->bigInteger('upload_size')->nullable();
            $table->string('balance')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('removed_at')->useCurrent();

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
        Schema::dropIfExists('remove_users');
    }
}
