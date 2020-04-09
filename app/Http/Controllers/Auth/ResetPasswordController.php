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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ResetPasswordController extends Controller
{
	//
	public function forgotpassword(){
		return view('emails.sendmail');
	}
    public function getForgotPassword(Request $request)
    {
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
    	$result = PasswordReset::where('token', $request->token)->first();
    	$data['info'] = $result->token;
    	if($result){
    		return view('user.Auth.resetPassword', $data);
    	} else {
    		echo 'Đường link đã hết hạn';
        }
    }
    public function newPass(Request $request)
    {
    	if($request->password == $request->confirm){
    		$result = PasswordReset::where('token', $request->token)->first();
    		User::where('email', $result->email)->update(['password'=>bcrypt($request->password)]);
    		PasswordReset::where('token', $request->token)->delete();
    		return redirect()->route('getlogin');
    	} else {
    		echo "Mật khẩu không khớp";
    	}
	}
	public function changepassword(){
		return view('user.Auth.changePassword');
	}
	public function changepass(Request $request){
		$oldpass = $request->oldpassword;
		$current_password = Auth::User()->password;  
		if(Hash::check($oldpass, $current_password)){
			if($request->confirm==$request->password){
				Auth::user()->password = Hash::make($request->oldpassword);
				Auth::user()->save();
				return redirect()->back()->with('status', 'Thay đổi mật khẩu thành công');
		  	} else return redirect()->back()->with('error', 'Mật khẩu không khớp');
		} else return redirect()->back()->with('error', 'Không đúng mật khẩu');
	  }
}
