<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
			$table->increments('id')->nullable(false)->unique();
			$table->string('order_id')->nullable(false);			
			$table->integer('user_id')->nullable(false);
            $table->string('book_array')->nullable(false);
			$table->integer('book_status')->nullable(false);
			$table->integer('amount')->nullable(false);
			$table->rememberToken();
			$table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
