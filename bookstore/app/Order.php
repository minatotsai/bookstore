<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'orders';
	
  protected $primarykey = 'id';
  
  public $timestamps = true;
}
