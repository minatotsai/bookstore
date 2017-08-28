<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

	public function index(Request $request)
    {
	/*
	if(Auth::attempt(['user_account' => $request->user_account, 'password' => $request->password],$request->remember)) {
				echo "good job";
		}
	*/
	
         $this->validate($request,[
		'user_account'=>'required',
		'password'=>'required'
	   ]);	  
		
		if(Auth::attempt(['user_account' => $request->user_account, 'password' => $request->password],$request->remember)) {
				
				return Redirect()->intended(route('books'));
				
		}
		
		return Redirect()->back()->withErrors(['errors' => '帳號或密碼錯誤!!',]);
	
    }
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
