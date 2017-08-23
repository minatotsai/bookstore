<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoppingcart extends Model
{
	protected $primarykey = 'cart_id';
    protected $table = 'shoppingcarts';
	
	protected $fillable = [
       'cart_id', 'user_id',  'book_id', 'book_buy_quantity', 'book_price',
    ];
	
	public $timestamps = true;
}
