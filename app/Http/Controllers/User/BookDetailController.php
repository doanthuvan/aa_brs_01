<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoteRequest;
use App\Models\Book;
use App\Models\Rate;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Comment;
use App\Models\BookUser;
use Illuminate\Support\Facades\DB;

class BookDetailController extends Controller
{
    public function index($id)
    { 
        try {
            $book = Book::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }

        if (Auth::check()) {
            $userRateBook = Rate::where([
                ['user_id', '=', Auth::user()->id],
                ['book_id', '=', $id],

            ])->first();
            $book_user = BookUser::where([
                ['book_id', '=', $id],
                ['user_id', '=', Auth::user()->id]
            ])->first();
        }else {
            $userRateBook = "";
            $book_user = "";
        }  
        $rate = DB::table('rates')
                     ->select(DB::raw('round(avg(rates.stars)) as avgstar '))
                     ->where('rates.book_id', $id)
                     ->groupBy('rates.book_id')
                     ->get();
        // $rate = Rate::where('rates.book_id',$id )->get();
        $star = "";
        foreach($rate as $rate){
           $star = $rate->avgstar;
        }
        $reviews = Review::with('user', 'comments', 'book')
            ->where('book_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('user.book.book', compact('book', 'userRateBook', 'reviews','star','book_user'));
    }

    public function readBook($id)
    {
        try {
            $book = Book::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }

        return view('user.bookread', compact('book'));
    }
    public function reviewBook(Request $request, $id)
    {  
        try {
            $book = Book::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }
        $requestcontent = $request->get('review');
        Review::create([
            'title' => $request->get('title'),
            'review_content' => $request->get('review'),
            'user_id' => Auth::user()->id,
            'book_id' => $id,

        ]);
        if($request->get('star')!=''){
            $rates = new Rate;
            $rates->book_id = $id;
            $rates->user_id = Auth::user()->id;
            $rates->stars = count($request->get('star'));
            $rates->save();
        }
        $reviews = Review::with('user', 'comments', 'book')
            ->where('book_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
            if (Auth::check()) {
                $userRateBook = Rate::where([
                    ['user_id', '=', Auth::user()->id],
                    ['book_id', '=', $id],
    
                ])->first();
            }else {
                $userRateBook = "";
            }
            $rate = DB::table('rates')
                     ->select(DB::raw('round(avg(rates.stars)) as avgstar '))
                     ->where('rates.book_id', $id)
                     ->groupBy('rates.book_id')
                     ->get();
        // $rate = Rate::where('rates.book_id',$id )->get();
        $star = "";
        foreach($rate as $rate){
           $star = $rate->avgstar;
        }
        return view('user.book.book', compact('book', 'userRateBook', 'reviews','star','requestcontent'));

    }
    public function showcreatereview(Request $request, $id)
    { 
        try {
            $book = Book::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }
        $reviews = Review::with('user', 'comments', 'book')
            ->where('book_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
            if (Auth::check()) {
                $userRateBook = Rate::where([
                    ['user_id', '=', Auth::user()->id],
                    ['book_id', '=', $id],
    
                ])->first();
            }else {
                $userRateBook = "";
            }
        $rate = DB::table('rates')
                     ->select(DB::raw('round(avg(rates.stars)) as avgstar '))
                     ->where('rates.book_id', $id)
                     ->groupBy('rates.book_id')
                     ->get();
        $star = "";
        foreach($rate as $rate){
           $star = $rate->avgstar;
        }
        return view('user.book.Review-book',compact('book','userRateBook','star'));

    }
    public function showReview(Request $request,$id){
        $reviews = Review::with('user', 'comments', 'book')
            ->where('id', $id)->first();
            $id_book = $reviews->book->id;
        $rate = DB::table('rates')
                     ->select(DB::raw('round(avg(rates.stars)) as avgstar '))
                     ->where('rates.book_id',$id_book)
                     ->groupBy('rates.book_id')
                     ->get();
        if (Auth::check()) {
                $userRateBook = Rate::where([
                    ['user_id', '=', Auth::user()->id],
                    ['book_id', '=', $id_book],
    
                ])->first();
            }else {
                $userRateBook = "";
            }
        $star = "";
        foreach($rate as $rate){
            $star = $rate->avgstar;
         }
      
        return view('user.book.review-detail',compact('reviews','star','userRateBook'));
    }
     // <img src='".url($comment->user->avatar)."'/>
    public function showComment(Request $request,$id){
        
        $comments = Comment::with('user')->where('review_id',$id )->get();
        return json_encode($comments) ;
    }
    public function createcomment(Request $request){
        $comments = new Comment();    
        if($request->get('comment_id')!="") {
        $comments->parent_comment_id = $request->get('comment_id');
        }else $comments->parent_comment_id = 0;
        $comments->review_id = $request->get('review_id');
        $comments->comment_content = $request->get('comment');
        $comments->user_id = $request->get('user_id');
        $comments->save();
        return "BẠN ĐÃ THÊM THÀNH CÔNG";
       
    }
}
