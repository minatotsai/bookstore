<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $table = 'books';
	
  protected $primarykey = 'book_id';
  
  public $timestamps = true;
}
