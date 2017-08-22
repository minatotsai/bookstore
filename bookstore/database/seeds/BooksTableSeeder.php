<?php

use Illuminate\Database\Seeder;
use App\Book;


class BooksTableSeeder extends Seeder
{
    
    public function run()
    {
		DB::table('books')->truncate();
		Book::create(['book_id'=>1,'book_name'=>'深入淺出PHP與MySQL','book_class'=>1,'book_quantity'=>20,'book_status'=>1,'book_price'=>882,'book_img'=>NULL,'created_at'=>'2017-08-16 07:53:09','updated_at'=>'2017-08-15 05:27:38']);
		Book::create(['book_id'=>2,'book_name'=>'C語言程式設計實務','book_class'=>1,'book_quantity'=>20,'book_status'=>1,'book_price'=>432,'book_img'=>NULL,'created_at'=>'2017-08-16 07:53:09','updated_at'=>'2017-08-15 05:28:42']);
		Book::create(['book_id'=>3,'book_name'=>'最新 Java 8 程式語言(第四版)','book_class'=>1,'book_quantity'=>20,'book_status'=>1,'book_price'=>618,'book_img'=>NULL,'created_at'=>'2017-08-16 07:53:09','updated_at'=>'2017-08-15 05:29:22']);
		Book::create(['book_id'=>4,'book_name'=>'PHP and MySQL Web Development','book_class'=>2,'book_quantity'=>20,'book_status'=>1,'book_price'=>1750,'book_img'=>NULL,'created_at'=>'2017-08-16 07:53:09','updated_at'=>'2017-08-15 05:29:22']);
		Book::create(['book_id'=>5,'book_name'=>'Basic Computation and Programming With C','book_class'=>2,'book_quantity'=>20,'book_status'=>1,'book_price'=>4275,'book_img'=>NULL,'created_at'=>'2017-08-16 07:53:09','updated_at'=>'2017-08-16 07:33:36']);
		Book::create(['book_id'=>6,'book_name'=>'Java: Data Structures and Programming','book_class'=>2,'book_quantity'=>20,'book_status'=>1,'book_price'=>4455,'book_img'=>NULL,'created_at'=>'2017-08-16 07:53:09','updated_at'=>'2017-08-16 07:38:15']);
	}
}


	
