<?php

namespace App\Http\Controllers\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Rate;
use App\Models\Review;
use App\Models\BookUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\collection;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\VoteRequest;
class BookController extends Controller
{
     public function index()
     {
        $books = Book::with('publisher', 'rates')->orderBy('id', 'DESC')->paginate(16);
        return view('user.book.all-book', compact('books'));

    }    
    public function search(Request $request){
        $books = Book::with('publisher', 'category')
        ->Findbook($request->search)
        ->orWhereHas("publisher",function($q) use($request){
            $q->where("publisher_name","like", "%$request->search%");
        })
        ->orWhereHas("category",function($q) use($request){
            $q->where("category_name","like", "%$request->search%");
        })->paginate(16);
        return view('user.book.all-book', compact('books'));
        }
    public function bookOfPublisher(Request $request,$id){
      
        $books = Book::with('rates', 'publisher')->bookOfPubliser($id);
        return view('user.book.all-book', compact('books'));
    }
    public function bookOfCategory(Request $request,$id){
        $books = Book::with('rates', 'publisher')->bookOfCategory($id);
        return view('user.book.all-book', compact('books'));
        }
    public function bookdetail($id){ 
        try {
            $book = Book::with('publisher', 'rates')->findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }
        if (Auth::check()) {
            $userRateBook = Rate::UserRateBook($id)->first();
            $book_user = BookUser::bookuser($id)->first();
        }else {
                $userRateBook = "";
                $book_user = "";
            }  
        $reviews = Review::with('user', 'comments', 'book')
                ->where('book_id', $id)
                ->orderBy('created_at', 'DESC')
                ->get();
        return view('user.book.book', compact('book', 'userRateBook', 'reviews','book_user'));
    }
    public function voteBook(VoteRequest $request, $id)
    {
        $rate = new Rate;
        $rate->book_id = $id;
        $rate->user_id = Auth::user()->id;
        $rate->stars = count($request->get('star'));
        $rate->save();
        return redirect()->back();
    }
}

