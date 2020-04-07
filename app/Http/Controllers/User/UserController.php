<?php

namespace App\Http\Controllers\User;
use App\Notifications\UserFollowed;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BookUser;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\RequestNewbook;
use App\Models\UserFollow;
use App\Notifications\RepliedToThread;
use App\Models\Notification;
class UserController extends Controller
{
  public function favoritebook(Request $request,$id){  
    if(Auth::check()){
      $users = Auth::user();
      $book = Book::find($id);
      $book_user = BookUser::bookuser($id)->get();
        if( $book_user==""){
          $book->users()->attach($users->id,[
              'favorite' => '1',
          ]); 
        } else 
            $book->users()->updateExistingPivot($users->id,[
              'favorite' => '1' ]); 
        return redirect()->back();
    }
  }
  public function bookread(Request $request,$id){  
    if(Auth::check()){
      $users = Auth::user();
      $book = Book::find($id);
      $book_user = BookUser::bookuser($id)->first();
    }
    if( $book_user==""){
      $book->users()->attach($users->id,[
              'read' => '1',
      ]); 
    } else 
        $book->users()->updateExistingPivot($users->id,[
              'read' => '1' ]); 
    return redirect()->back();
  }
  public function bookreading(Request $request,$id){  
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
    } else 
      $book->users()->updateExistingPivot($users->id,[
              'read' => '1' ]); 
    return redirect()->back();
  }
  public function toggleLike(Request $request){
    $reviewtId=$request->get('reviewId');
    $review=Review::find($reviewtId);
    if(!$review->isLiked()){
      $review->likeIt();
      return response()->json(['status'=>'success','message'=>'liked']);
    } else{
      $review->unlikeIt();
      return response()->json(['status'=>'success','message'=>'unliked']);
    }
    }
  public function member(){           
    $users = DB::table('users')->paginate(16);
    return view('user.members.member', compact('users'));
  }
  public function personal(Request $request,$id){ 
    $user = User::find($id);
    $isfollower = UserFollow::isfollower($id)->first();
    return view('user.members.personalpage',compact('user','isfollower'));
  }
  public function follow(Request $request,$id){
    $user = User::find(Auth::user()->id);
    $user->followers()->attach($id);
    return redirect()->back();
}
  public function unfollow(Request $request,$id){
    $user = User::find(Auth::user()->id);
    $user->followers()->detach($id);
    return redirect()->back();
  }
  public function followers(Request $request,$id){
      $user = User::find($id);
      $isfollower = UserFollow::isfollower($id)->first();
      return view('user.members.followers',compact('user','isfollower'));
  }
  public function managefollow(Request $request){
      $user = User::find(Auth::user()->id);
      return view('user.members.managefollower',compact('user'));
  }
  public function maganereview(){
    $reviews = Review::with('book')->get();
    return view('user.reviews.manage',compact('reviews'));
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
    Auth::user()->notify(new RepliedToThread($requestNewbook));
    return redirect('/recommend-book')->with('status', 'Bạn đã gửi yêu cầu thành công');
  }
}