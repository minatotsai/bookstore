<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\book;
use App\User;
use Auth;
use App\Shoppingcart;
use Illuminate\Http\Response;


class BooksController extends Controller
{
		public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		$query = book::all();
		return view('books', compact('query'));
	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = Auth::user()->user_id;		
		$num = explode(',' ,$id);
		
		$book = book::where('book_id', $num[0])->count();		
		$book_q = book::where('book_id', $num[0])->get();
		//echo $book;
		$book_quantity = 0;
		$book_price = 0;
		foreach ($book_q as $var)
		{
			$book_quantity = $var->book_quantity;
			$book_price = $var->book_price;
		}
		/*
		echo $book_quantity;
		print_r($num);
		echo "</br>";
		*/
		if(!is_numeric($num[1]))
		{
			return redirect()->back()
							->withInput()
							->withErrors(['errors' => '您所輸入的書本數量有誤，請檢查有無數字以外的符號進入!!',]);
		}
		
		if(empty($num[1]) || $num[1]<0) 
		{
			return redirect()->back()
							->withInput()
							->withErrors(['errors' => '您所設置的書本數量有誤!!',]);
		}
		
		if($num[1]>$book_quantity)
		{
			return redirect()->back()
							->withInput()
							->withErrors(['errors' => '您所設置的書本數量超過現有數量!!',]);
		}
		
		if($book == 0)
		{
			return redirect()->back()
							->withInput()
							->withErrors(['errors' => '您所傳輸的資料有誤!!',]);
		}
		else if ($book == 1)
		{			
			
			//$cart = Shoppingcart::where('book_id', $num[0] and 'user_id', $user)->count();
			$cart = Shoppingcart::where('book_id', $num[0])->where('user_id', $user)->count();
			
			if($cart==0)
			{	
				/* 如果資料庫內無資料則做新增 */			
				Shoppingcart::insert([
				['user_id' => $user, 'book_id' => $num[0],'book_buy_quantity' => $num[1],'book_price' => $book_price, "created_at" =>  \Carbon\Carbon::now(),
				"updated_at" => \Carbon\Carbon::now(), ],
				]);
				
				return redirect()->back()->with('success' , '已存進購物車內!!');
			
			}
			else if($cart == 1)
			{
				/* 取出該筆資料之數量並修改 */
				$cart_array = Shoppingcart::where('book_id', $num[0])->where('user_id', $user)->get();
				$cart_id =0;
				$query = 0;
				foreach ($cart_array as $var)
				{
					$query = $var->book_buy_quantity;
					$cart_id = $var->cart_id;				
				}				
				$query = $query + $num[1];				
				
				if($query>$book_quantity)
				{
					return redirect()->back()
							->withInput()
							->withErrors(['errors' => '您所設置的書本數量超過現有數量!!',]);
				}
				else
				{
					$cart_query =  DB::table('shoppingcarts')->where('cart_id' ,$cart_id)->update(['book_buy_quantity' => $query]);
					return redirect()->back()->with('success' , '已成功修改數量!!');	
				}				
			}
			
			
		}
		else
		{
		return redirect()->back()
							->withInput()
							->withErrors(['errors' => '未知的錯誤，請聯絡系統工程師。',]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $query = book::where('book_class',$id)->get();
		return view('books', compact('query'));
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
}
