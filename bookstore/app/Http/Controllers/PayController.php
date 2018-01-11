<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\book;
use App\User;
use Auth;
use App\Order;
use App\Shoppingcart;
class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->user_id;		
		
		
		$query = Shoppingcart::join('books', 'shoppingcarts.book_id', '=', 'books.book_id')
							->select('shoppingcarts.*', 'books.book_name', 'books.book_quantity')
							->where('shoppingcarts.user_id',$user)
							->get();
		$count = Shoppingcart::where('user_id',$user)->count();
		
		if($count == 0)
		{
			return redirect()->back()
							->withInput()
							->withErrors(['errors' => '購物車內並無任何品項!!',]);
		}
		
		/*
		$amount = 0;	
		foreach ($query as $var)
		{
			echo $var->book_name."</br>";
			echo $var->book_quantity."</br>";
			echo $var->user_id."</br>";
			echo $var->book_id."</br>";
			echo $var->book_buy_quantity."</br>";
			echo $var->book_price."</br>";
			echo "</br>";
			$amount = $amount + $var->book_price;
		}
		echo $amount;
		*/
		return view('pay', compact('query'));
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->user_id;	
		
		$query = Shoppingcart::join('books', 'shoppingcarts.book_id', '=', 'books.book_id')
							->select('shoppingcarts.*', 'books.book_name', 'books.book_quantity')
							->where('shoppingcarts.user_id',$user)
							->get();
							
		$amount = 0;
		$book_array = "";
		foreach ($query as $var)
		{
			$book_array = $book_array."," .$var->book_name."*".$var->book_buy_quantity." 共:".($var->book_price*$var->book_buy_quantity)."元";
			echo "</br>";
			$amount = $amount + ($var->book_price * $var->book_buy_quantity);
		}
		echo $amount."</br>";
		$book_array = substr($book_array,1,strlen($book_array));	
		echo $book_array;
		
		$order_id=substr(md5(rand()),0,15);
		
		//寫入訂單
		order::insert([
		['order_id' => $order_id, 'user_id' => $user, 'book_array' => $book_array,'book_status' => '0','amount' => $amount, "created_at" =>  \Carbon\Carbon::now()->addHours(8),
		"updated_at" => \Carbon\Carbon::now()->addHours(8), ],
		]);
		
		//刪除購物車內品項
		Shoppingcart::where('user_id', $user)->delete();
		
		//取回訂單編號
		$order = Order::where('user_id', $user)
							->orderBy('order_id', 'desc')
							->limit(1)
							->get();
		
		foreach ($order as $var)
		{
			echo $var->order_id."</br>";
			echo $var->user_id."</br>";
			echo $var->book_array."</br>";
			echo $var->book_status."</br>";
			echo $var->amount."</br>";
			echo "</br>";
			
		}
		
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value = $request;
		echo $value->MerchantTradeNo;
		echo "</br></hr>";
		echo $value->RtnCode;
		
		DB::table('orders')->where('order_id' ,$value->MerchantTradeNo)
								  ->update(['book_status' => 1,'updated_at' =>\Carbon\Carbon::now()->addHours(8)]);
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	 public function test()
    {
       return view('allpaytest');
    }
}
