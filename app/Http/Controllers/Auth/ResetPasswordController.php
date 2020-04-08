<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\PasswordReset;
use App\Notifications\ResetPasswordRequest;
use App\Mail\UserEmail;
use Illuminate\Support\Facades\Mail;
class ResetPasswordController extends Controller
{
    //
    public function getForgotPassword(Request $request)
    {
    	//Tạo token và gửi đường link reset vào email nếu email tồn tại
        $result = User::where('email', $request->email)->first();
    	if($result){
    		$resetPassword = PasswordReset::firstOrCreate(['email'=>$request->email, 'token'=>Str::random(60)]);

    		$token =PasswordReset::where('email', $request->email)->first();
             $link = url('/resetPassword')."/".$token->token;
            Mail::to($request->email)->send(new UserEmail($link)); 
            return view('emails.sendmail')->with('success','Hãy kiểm tra email của bạn để thay đổi mật khẩu');//send it to email
    	} else {
            return view('emails.sendmail')->with('success','Email không tồn tại trong hệ thống');
    	}
    	
    }
    public function resetPassword(Request $request)
    {
    	// Check token valid or not
    	$result = PasswordReset::where('token', $request->token)->first();

    	$data['info'] = $result->token;

    	if($result){
    		return view('user.Auth.resetPassword', $data);
    	} else {
    		echo 'This link is expired';
        }
    }
    public function newPass(Request $request)
    {
    	// Check password confirm
    	if($request->password == $request->confirm){
    		// Check email with token
    		$result = PasswordReset::where('token', $request->token)->first();

    		// Update new password 
    		User::where('email', $result->email)->update(['password'=>bcrypt($request->password)]);

    		// Delete token
    		PasswordReset::where('token', $request->token)->delete();

    		return redirect()->route('getlogin');
    	} else {
    		echo "Password doesn't match";
    	}
    }
}
