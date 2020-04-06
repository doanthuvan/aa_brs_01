<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Input;
use App\Notifications\UserFollowed;
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
use App\Models\UserFollow;
use App\Notifications\RepliedToThread;
use App\Models\Notification;

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
       
          public function favoritebook(Request $request,$id)

          {  
        //  h::check()){
          if(Auth::check()){
            $users = Auth::user();
            $book = Book::find($id);
            $book_user = BookUser::bookuser($id)->get();
          //   $book->users()->attach($users->id,[
          //     'favorite' => '1',
          // ]);
            // echo $book_user;
            if( $book_user==""){
            $book->users()->attach($users->id,[
              'favorite' => '1',
          ]); 
            }
            else $book->users()->updateExistingPivot($users->id,[
              'favorite' => '1' ]); 
        // echo ('<pre>'); print_r($book_user); echo ('<pre>');
         
          return redirect()->back();
          }
        }
       public function bookread(Request $request,$id)

          {  
        //  h::check()){
          if(Auth::check()){
            $users = Auth::user();
            $book = Book::find($id);
            $book_user = BookUser::bookuser($id)->first();
          }
            if( $book_user==""){
            $book->users()->attach($users->id,[
              'read' => '1',
          ]); 
            }
            else $book->users()->updateExistingPivot($users->id,[
              'read' => '1' ]); 
           return redirect()->back();
          }
          public function bookreading(Request $request,$id)

          {  
        //  h::check()){
          if(Auth::check()){
            $users = Auth::user();
            $book = Book::find($id);
            $book = Book::find($id);
            $book_user = BookUser::bookuser($id)->first();
          }
            if( $book_user==""){
            $book->users()->attach($users->id,[
              'reading' => '1',
          ]); 
            }
            else $book->users()->updateExistingPivot($users->id,[
              'read' => '1' ]); 
          return redirect()->back();
          }
         
          public function showreview(Request $request,$id){ 
            $userFollows = UserFollow::with('user')->where('follower',$id)->get();
            $user = DB::table('users')->where('id', '=',$id)->first();
            $status = "Review sách";
            $userFollow = UserFollow::where([
              ['user_id', '=', Auth::user()->id],
              ['follower', '=', $id],
              ])->first();
            $reviews = Review::with('book')
            ->join('books', 'reviews.book_id', '=', 'books.id')
            ->where('user_id', $id)->get();
            
            return view('user.preson-review',compact('user','reviews','status','userFollow','userFollows'));
          }
        
public function toggleLike(Request $request){
        $reviewtId=$request->get('reviewId');
        $review=Review::find($reviewtId);
        // $usersLike= $review->likes()->where('user_id',auth()->id())->where('likable_id',$review)->first();
        if(!$review->isLiked()){
          $review->likeIt();
          return response()->json(['status'=>'success','message'=>'liked']);

      }else{
        $review->unlikeIt();
          return response()->json(['status'=>'success','message'=>'unliked']);

      }
        $review->isLiked();

      }
    }




