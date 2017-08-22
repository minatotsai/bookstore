<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    
    public function run()
    {
		DB::table('users')->truncate();
		User::create(['user_id'=>1,'user_account'=>'Alex','password'=> Hash::make('123'),'created_at'=>'2017-08-16 07:58:59','updated_at'=>'2017-08-16 07:58:59']);
		User::create(['user_id'=>2,'user_account'=>'Ben','password'=> Hash::make('123'),'created_at'=>'2017-08-16 07:59:24','updated_at'=>'2017-08-16 07:59:24']);
		User::create(['user_id'=>3,'user_account'=>'Cindy','password'=> Hash::make('123'),'created_at'=>'2017-08-16 07:59:52','updated_at'=>'2017-08-16 07:59:52']);
	}
}

