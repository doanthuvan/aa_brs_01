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
}