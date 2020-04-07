<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Category;
use App\Models\Author;
use App\Models\RequestNewbook;
use App\Notifications\RepliedToThread;
use App\Models\BookUser;
use App\Models\Notification;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct()
    {   
        $this->middleware('auth');
       
    }
    public function index()
    {
        //
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        $books = Book::all();
        $users = DB::table('users')->paginate(16);
        return view('admin.home',compact('users','books','categories','publishers','authors'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function showbooks()
    {
        //
        $books = Book::with('publisher', 'rates')->orderBy('id', 'DESC')->paginate(16);
        return view('admin.book.index', compact('books'));
       
    }
    public function createbook()
    {
        //
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        
        return view('admin.book.create',compact('categories','publishers','authors'));
       
    }
    public function storebook(Request $request)
    {
        //
        $book = new Book(); 
        $book->publisher_id = $request->get('category');
        $book->category_id = $request->get('publisher');
        $book->title = $request->get('title');
        $file = $request->filesTest;
        $book->image = "img/product/".$file->getClientOriginalName();
        $book->book_content = $request->get('content');
        $book->book_description = $request->get('des');
        $book->save();
        $book->authors()->attach($request->get('author'));
        
        return redirect(action('Admin\AdminController@createbook'))->with('status', 'Bạn đã thêm sách thành công');
    }
    public function editbook(Request $request,$id)
    {
        //
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        $book = Book::with('publisher', 'rates')->where('id',$id)->first();
        return view('admin.book.edit', compact('book','categories','publishers','authors'));
    }
    public function updatebook(Request $request, $id)
    {
        //
        $book = Book::where('id',$id)->first();
        $file = $request->filesTest;
        $book->image = "img/product/".$file->getClientOriginalName();
        
        $book->publisher_id = $request->get('publisher');
        $book->category_id = $request->get('category');
        $book->title = $request->get('title');
        $book->book_content = $request->get('content');
        $book->book_description = $request->get('des');
        $book->save();
        $book->authors()->sync($request->get('author'));
        return redirect(action('Admin\AdminController@editbook', $book->id))->with('status', 'Cập nhật thành công');
    }
    public function destroybook($id)
    {
        
             $book = Book::where('id',$id)->first();
             $book->reviews()->delete();
             $book_user = BookUser::bookuser($id)->delete();
             $book->delete();
             $book->authors()->detach();
			 return redirect('/admin/books')->with('status', "Bạn đã xóa thành công");
    }
    public function showrequestnewbook(){
        $requestnewbooks = RequestNewbook::where('status',0)->get();
        $approveds = RequestNewbook::where('status',1)->get();
        return view('admin.request-book', compact('requestnewbooks','approveds'));
    } 
    public function approved($id){
        $requestnewbooks = RequestNewbook::where('id',$id)->first();
        $requestnewbooks->status = 1;
        $requestnewbooks->save();
        return redirect(action('Admin\AdminController@showrequestnewbook'))->with('status', 'Đã phê duyệt sách');
    }
    public function destroyrequest($id)
        {
            // 
            $requestnewbooks = RequestNewbook::where('id',$id)->first();
            $requestnewbooks->delete();
                return redirect(action('Admin\AdminController@showrequestnewbook'))->with('status', "Bạn đã xóa thành công");
     }
  
}