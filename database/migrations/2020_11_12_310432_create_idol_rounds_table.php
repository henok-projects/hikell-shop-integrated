<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdolRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idol_rounds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idol_id')->unsigned();
            $table->string('name');
            $table->bigInteger('start_date');
            $table->bigInteger('end_date');
            $table->enum('is_active', [0, 1])->default(1);
            $table->timestamps();

            $table->foreign('idol_id')
                ->references('id')
                ->on('idols')
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
        Schema::dropIfExists('idol_rounds');
    }
}
