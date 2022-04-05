<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('gender', ['m', 'f']);
            $table->string('country');
            $table->string('phone_code');
            $table->string('phone_number');
            $table->string('avatar')->nullable();
            $table->string('birth_date')->nullable();
            $table->enum('admin', ['0', '1', '2'])->default('0')->comment('0: non-admin, 1: admin, 2: superAdmin');
            $table->string('upload_size')->nullable();
            $table->string('storage_limit')->nullable();
            $table->double('balance')->default(0);
            $table->rememberToken();
            $table->timestamps();

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
    }
}