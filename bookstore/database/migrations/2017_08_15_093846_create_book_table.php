<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('book_id')->nullable(false);
			$table->string('book_name')->nullable(false);
			$table->integer('book_class')->nullable(false);
			$table->integer('book_quantity')->nullable(false);
			$table->integer('book_status')->nullable(false);
			$table->binary('book_img')->nullable(true);
			$table->integer('book_price')->nullable(false);
			$table->string('book_img_name')->nullable(true);			
			$table->rememberToken();
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
        Schema::dropIfExists('books');
    }
}
