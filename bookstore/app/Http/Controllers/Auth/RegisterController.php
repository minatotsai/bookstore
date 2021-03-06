<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/books';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'user_account' => 'required|string|max:255',            
            'password' => 'required|string|min:6|confirmed',
        ]);
			
		$user_count = User::where('user_account', $data['user_account'])->count();
		
		$validator->after(function($validator) use($user_count)
			{
				if($user_count == 1)
				{
					$validator->errors()->add('errors', '帳號重複!!');
				}
			});
		/*
		 if ($validator->fails())
			{
				return redirect()->back()->withErrors($validator->errors());
			}
		*/
		return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {	
        return User::create([
            'user_account' => $data['user_account'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
