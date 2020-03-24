<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
		public function showInfor()
			{          if(Auth::check()){
                          $email = Auth::user()->email;
                        $users = DB::table('users')->where('email', '=','aa@gmail.com')->first();
                        return view('user.acount', compact('users'));
            }
			}
}



