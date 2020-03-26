<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BookUser;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\RequestNewbook;
use App\Models\UserActivity;


class UserController extends Controller
{
    //
		public function showInfor()
			{          if(Auth::check()){
                        $email = Auth::user()->email;
                        $users = DB::table('users')->where('email', '=',Auth::user()->email)->first();
                        return view('user.acount', compact('users'));
            }
            }
            public function member()
		        	{           
                       $users = DB::table('users')->paginate(16);
                        return view('user.member', compact('users'));
          
            }
        public function recommend(){
            return view('user.book.recommend-book');
        }
        public function sentrecommend(Request $request ){
          $requestNewbook = new RequestNewbook();    
          $requestNewbook->book_name = $request->get('name');
          $requestNewbook->author = $request->get('author');
          $requestNewbook->request_content = $request->get('content');
          $requestNewbook->user_id = Auth::user()->id;
          $requestNewbook->status = 0;
          
          $requestNewbook->save();
          return redirect('/recommend-book')->with('status', 'Bạn đã gửi yêu cầu thành công');

        }
        public function listrecommend(){
          $requestNewbooks = DB::table('request_newbooks')->orderBy('created_at', 'DESC')->paginate(16);   
          return view('user.book.listrecomend',compact('requestNewbooks'));
      }
      public function edit()
			{          if(Auth::check()){
                        $email = Auth::user()->email;
                        $users = DB::table('users')->where('email', '=',Auth::user()->email)->first();
                        return view('user.edit-infor', compact('users'));
            }
          }
          public function updateinfor(Request $request)
          { 
            $user = User::where('email', '=',Auth::user()->email)->firstOrFail();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            // if ($request->hasFile('fileTest')) {
              $file = $request->filesTest;
              $user->avatar= "img/user/".$file->getClientOriginalName();
          // }
            $user->save();
            return redirect('/edit-infor')->with('status', 'Bạn đã cập nhật thông tin thành công');
          }
          public function favoritebook(Request $request,$id)

          {  
        //  h::check()){
          if(Auth::check()){
            $email = Auth::user()->email;
            $users = DB::table('users')->where('email', '=',Auth::user()->email)->first();
            
           $book_user = BookUser::where([
            ['user_id', '=', Auth::user()->id],
            ['book_id', '=', $id],
            ])->first();
            $userid = $users->id;
          }
          if($book_user!=""){
            $book_user->favorite =1;
            $book_user->save();
          }else{
            DB::table('book_user')->insert(
              ['book_id' => $id, 'user_id' =>$userid,'favorite' => 1]
          );
        }
          $userActivity = new UserActivity();    
          $userActivity->activity_id = 26;
          $userActivity->user_id = Auth::user()->id;
          $userActivity->save();
          return redirect()->back();
          }
       public function bookread(Request $request,$id)

          {  
        //  h::check()){
          if(Auth::check()){
            $email = Auth::user()->email;
            $users = DB::table('users')->where('email', '=',Auth::user()->email)->first();
            $book_user = BookUser::where([
              ['user_id', '=', Auth::user()->id],
              ['book_id', '=', $id],
              ])->first();
              $userid = $users->id;
          }
          if($book_user!=""){
            $book_user->read =1;
            $book_user->reading =0;
            $book_user->save();
          }else{
            DB::table('book_user')->insert(
              ['book_id' => $id, 'user_id' =>$userid,'read' => 1, 'favorite' => 0]
          );
        }
          $userActivity = new UserActivity();    
          $userActivity->user_id = Auth::user()->id;
          $userActivity->activity_id = 28;
          $userActivity->save();
          return redirect()->back();
          }
          public function bookreading(Request $request,$id)

          {  
        //  h::check()){
          if(Auth::check()){
            $email = Auth::user()->email;
            $users = DB::table('users')->where('email', '=',Auth::user()->email)->first();
            $book_user = BookUser::where([
              ['user_id', '=', Auth::user()->id],
              ['book_id', '=', $id],
              ])->first();
              $userid = $users->id;
          }
          if($book_user!=""){
            $book_user->reading =1;
            $book_user->read =0;
            $book_user->save();
          }else{
            DB::table('book_user')->insert(
              ['book_id' => $id, 'user_id' =>$userid,'reading' => 1, 'favorite' => 0]
          );
        }
  
          $userActivity = new UserActivity();    
          $userActivity->user_id = Auth::user()->id;
          $userActivity->activity_id = 29;
          $userActivity->save();
          return redirect()->back();
          }
          public function personal(Request $request,$id){ 
            $user = DB::table('users')->where('id', '=',$id)->first();
            $books = Book::with('rates', 'publisher')
            ->join('book_user', 'book_user.book_id', '=', 'books.id')
            ->where('book_user.user_id', $id)->get();
            $reviews = Review::where('user_id', '=',84)->get();
            return view('user.personalpage',compact('user','reviews','books'));
          }
}



