<?php

namespace App\Http\Controllers\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function __construct()
    {   
        $this->middleware('auth');
       
    }
    public function index(){
            $cate =DB::table('categories')->distinct()->get();
            $pub = DB::table('publishers')->distinct()->get();
            $newUpdatedBooks = Book::with('publisher', 'rates')->orderBy('id', 'DESC')->limit(10)
            ->get();
    
            $highestViewedBooks = Book::with('publisher', 'rates')->orderBy('view', 'DESC')->limit(10)
            ->get();

        return view('user.home', compact('newUpdatedBooks', 'highestViewedBooks','cate','pub'));
    }
    
}
