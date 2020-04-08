<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\OrderShipped;
use App\Mail\UserEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function sendEmailReminder(Request $request)
    {
        // $id = 2; 
        // $user = User::find($id);
      Mail::to('thuvancloud@gmail.com')->send(new UserEmail());
        
       
    }
}