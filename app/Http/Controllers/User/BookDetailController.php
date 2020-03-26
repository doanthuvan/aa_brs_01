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

    
}
