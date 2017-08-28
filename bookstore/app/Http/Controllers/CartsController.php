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
	
		$query = Shoppingcart::join('books', 'shoppingcarts.book_id', '=', 'books.book_id')
							->select('shoppingcarts.*', 'books.book_name', 'books.book_quantity')
							->where('shoppingcarts.user_id',$user)
							->get();
		/*		
		foreach ($query as $var)
		{
			echo $var->book_name."</br>";
			echo $var->book_quantity."</br>";
			echo $var->user_id."</br>";
			echo $var->book_id."</br>";
			echo $var->book_buy_quantity."</br>";
			echo $var->book_price."</br>";
			echo "</br>";
		}
	*/
	
	//	$query = Shoppingcart::where('user_id', $user)->get();
		return view('carts', compact('query'));
	
    }
	
	public function edit($id)
    {
		$user = Auth::user()->user_id;		
		$num = explode(',' ,$id);
		
		$book_q = book::where('book_id', $num[0])->get();
		$book_quantity = 0;
		foreach ($book_q as $var)
		{
			$book_quantity = $var->book_quantity;
		}
		
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
		else
		{
			$cart_query =  DB::table('shoppingcarts')
									->where('user_id' ,$user)
									->where('book_id', $num[0])
									->update(['book_buy_quantity' => $num[1]]);
			return redirect()->back()->with('success' , '已成功修改數量!!');	
		
		}

		
    }
	
	 public function destroy($id)
    {
        $affectedRows = Shoppingcart::where('cart_id', $id)->delete();
		return redirect()->back()->with('success' , '已成功刪除!!');
    }
	
	
}
