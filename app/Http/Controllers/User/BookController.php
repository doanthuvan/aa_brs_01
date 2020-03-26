<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publisher;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\collection;
class BookController extends Controller
{
     public function index()
    {
        $cate =DB::table('categories')->get();
        $pub = DB::table('publishers')->get();
        $books = Book::with('publisher', 'rates')->orderBy('id', 'DESC')->paginate(16);
        return view('user.book.all-book', compact('books','cate','pub'));

    }

    public function nxb($id){
        try {
            $publisher = Publisher::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }
        $cate =DB::table('categories')->get();
        $pub = DB::table('publishers')->get();
        $books = Book::with('rates', 'publisher')
            ->where('publisher_id', $id)
            ->paginate(12);

        return view('user.book.book-publisher', compact('publisher', 'books','cate','pub'));
    }

    public function search(Request $request){
        $books = Book::with('rates', 'publisher')
        ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        ->join('categories', 'categories.id', '=', 'books.category_id')
        ->where('title', 'LIKE', '%' . $request->search . '%')
        ->orWhere('publishers.publisher_name', 'LIKE', '%' . $request->search . '%')
        ->orWhere('categories.category_name', 'LIKE', '%' . $request->search . '%')
        ->paginate(12);
            
        $cate =DB::table('categories')->get();
        $pub = DB::table('publishers')->get();
        return view('user.book.search-book', compact('books','cate','pub'));
        }
       
}

