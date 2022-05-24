<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('user_id');
        $table->string('site_id');
        $table->string('product_id')->unique();
        $table->string('name');
        $table->string('slug')->unique();
        $table->string('short_description')->nullable();
        $table->text('description');
        $table->decimal('regular_price');
        $table->decimal('sale_price')->nullable();
        $table->string('SKU');
        $table->enum('stock_status',['instock','outofstock']);
        $table->enum('allow_reuse', [0, 1])->default(0);
        $table->boolean('featured')->default(false);
        $table->unsignedInteger('quantity')->default(10);
        $table->string('image')->nullable();
        $table->string('images')->nullable();
        $table->string('category_id')->nullable();
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
