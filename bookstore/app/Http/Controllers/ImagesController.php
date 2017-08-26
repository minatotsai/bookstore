<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\book;

class ImagesController extends Controller
{
   public function index()
    {

		$query = book::all();
		return view('images', compact('query'));
	
    }
	
	 public function show($id)
    {
		$query = book::where('book_id', $id)->get();
		return view('imagesEdit', compact('query'));
    }
	
	public function edit(Request $request)
    {
		
		
			$id_len = 10;//字串長度
			$filename = '';
			$word = 'abcdefghijkmnpqrstuvwxyz23456789';//字典檔 你可以將 數字 0 1 及字母 O L 排除
			$len = strlen($word);//取得字典檔長度
 
			for($i = 0; $i < $id_len; $i++){ //總共取 幾次
				$filename .= $word[rand() % $len];//隨機取得一個字元
			}
			
		
		
		
		
		if($request->hasFile('image')){
		
		$filesize = $request->image->getClientSize();
		$request->image->move(base_path().'/public/img/', $filename);
		
		
		$book_query =  DB::table('books')->where('book_id' ,$request->book_id)
						->update(['book_img' => $filesize ,'book_img_name' => $filename]);
		return redirect()->route('images')->with('success' , '已成功修改!!');
		
		}

		/*
		$query = book::where('book_id', $id)->get();
		return view('imagesEdit', compact('query'));
		
        $cart_query =  DB::table('shoppingcarts')->where('cart_id' ,$cart_id)->update(['book_buy_quantity' => $query]);
		return redirect()->back()->with('success' , '已成功修改數量!!');
		*/
    }
}
