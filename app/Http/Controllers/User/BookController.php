<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publisher;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
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
       
}

