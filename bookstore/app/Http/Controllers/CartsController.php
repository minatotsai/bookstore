<?php

namespace App\Http\Controllers;
use DB;
use App\book;
use Auth;
use App\member;
use App\Shoppingcart;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CartsController extends Controller
{
     public function index()
    {
		$user = Auth::user()->user_id;		

		$query = Shoppingcart::where('user_id', $user)->get();
		return view('carts', compact('query'));
	
    }
}
