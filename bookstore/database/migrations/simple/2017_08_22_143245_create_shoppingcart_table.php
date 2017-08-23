<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingcartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppingcarts', function (Blueprint $table) {
            $table->increments('cart_id')->nullable(false);
			
			$table->integer('user_id')->unique();
            $table->integer('book_id')->unique();
			$table->integer('book_buy_quantity')->unique();
			$table->integer('book_price')->unique();
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
        Schema::dropIfExists('shoppintcarts');
    }
}
