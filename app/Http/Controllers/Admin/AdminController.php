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
use App\Mail\RepToRequestBook;
use Illuminate\Support\Facades\Mail;
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
        // $notification = Notification::where('type','App\Notifications\RepliedToThread');
        // echo '<pre>';
        // print_r($notification);
        // echo '</pre>';
        // exit();
        $users = DB::table('users')->paginate(16);
        return view('admin.home',compact('users','books','categories','publishers','authors'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showusers()
    {
        //
        $users = DB::table('users')->paginate(16);
        return view('admin.user.home', compact('users'));
       
    }
    public function create()
    {
        //
    }

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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edituser(Request $request,$id)
    {
        //
        $user = User::where('id',$id)->first();
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateuser(Request $request, $id)
    {
        //
        $user = User::where('id',$id)->first();
        $user->role = $request->get('role');
        $user->save();
        return redirect(action('Admin\AdminController@edituser', $user->id))->with('status', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyuser($id)
    {
        //
             $user = User::where('id',$id)->first();
			 $user->delete();
			 return redirect('/admin')->with('status', "Bạn đã xóa thành công");
    }
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
        $requestnewbooks = RequestNewbook::with('user')->where('status',0)->get();
        $approveds = RequestNewbook::where('status',1)->get();
        return view('admin.request-book', compact('requestnewbooks','approveds'));
} 
public function approved($id){
    $requestnewbooks = RequestNewbook::with('user')->where('id',$id)->first();
    $requestnewbooks->status = 1;
    $requestnewbooks->save();
    Mail::to($requestnewbooks->user->email)->send(new RepToRequestBook(1)); 
    return redirect(action('Admin\AdminController@showrequestnewbook'))->with('status', 'Đã phê duyệt sách');
}
public function destroyrequest($id)
    {
        // 
        $requestnewbooks = RequestNewbook::with('user')->where('id',$id)->first();
        $requestnewbooks->delete();
        Mail::to($requestnewbooks->user->email)->send(new RepToRequestBook(1)); 
		return redirect(action('Admin\AdminController@showrequestnewbook'))->with('status', "Bạn đã xóa thành công");
    }
   public function showcategories(){
    $categories = Category::all();
    return view('admin.categories.index', compact('categories'));
   }
   public function createcategory()
   {
       //
       return view('admin.categories.create');
      
   }
   public function storecategory(Request $request)
   {
       //
       $category = new Category(); 
       $category->category_name = $request->get('name');
       $category->save();
       return redirect(action('Admin\AdminController@createcategory'))->with('status', 'Bạn đã thêm thành công');
   }
   public function editcategory(Request $request,$id)
    {
        $category =Category::where('id',$id)->first();
        return view('admin.categories.edit', compact('category'));
    }
    public function updatecategory(Request $request, $id)
    {
        $category =Category::where('id',$id)->first();
       
        $category->category_name = $request->get('name');
        $category->save();
        return redirect(action('Admin\AdminController@editcategory', $category->id))->with('status', 'Cập nhật thành công');
    }
    public function destroycategory($id)
    {
        $category =Category::where('id',$id)->first();
        $category->delete();
			 return redirect(action('Admin\AdminController@showcategories'))->with('status', "Bạn đã xóa thành công");
    }
    public function showpublishers(){
        $publishers =Publisher::all();
        return view('admin.publishers.index', compact('publishers'));
       }
       public function createpublisher()
       {

           return view('admin.publishers.create');
          
       }
       public function storepublisher(Request $request)
       {
           //
           $publisher = new Publisher(); 
           $publisher->publisher_name = $request->get('name');
           $publisher->save();
           return redirect(action('Admin\AdminController@createpublisher'))->with('status', 'Bạn đã thêm thành công');
       }
       public function editpublisher(Request $request,$id)
        {
            $publisher =Publisher::where('id',$id)->first();
            return view('admin.publishers.edit', compact('publisher'));
        }
        public function updatepublisher(Request $request, $id)
        {
            //
            $publisher =Publisher::where('id',$id)->first();
            $publisher->publisher_name = $request->get('name');
            $publisher->save();
            return redirect(action('Admin\AdminController@editpublisher', $publisher->id))->with('status', 'Cập nhật thành công');
        }
        public function destroypublisher($id)
        {
            // 
            $publisher =Publisher::where('id',$id)->first();
            $publisher->books->delete();
            $publisher->delete();
            return redirect(action('Admin\AdminController@showpublishers'))->with('status', "Bạn đã xóa thành công");
        }
        public function showauthors(){
            $authors =Author::all();
            return view('admin.authors.index', compact('authors'));
           }
           public function createauthor()
           {
               return view('admin.authors.create');
              
           }
           public function storeauthor(Request $request)
           {
               //
               $authors = new Author(); 
               $authors->author_name = $request->get('name');
               $authors->save();
               return redirect(action('Admin\AdminController@createauthor'))->with('status', 'Bạn đã thêm thành công');
           }
           public function editauthor(Request $request,$id)
            {
                $author = Author::where('id',$id)->first();
                return view('admin.authors.edit', compact('author'));
            }
            public function updateauthor(Request $request, $id)
            {
                //
                $author = Author::where('id',$id)->first();
                $author->author_name = $request->get('name');
                $author->save();
                return redirect(action('Admin\AdminController@editauthor', $author->id))->with('status', 'Cập nhật thành công');
            }
            public function destroyauthor($id)
            {
                $author = Author::where('id',$id)->first();
                $author->books()->detach();
                $author->delete();
                return redirect(action('Admin\AdminController@showauthors'))->with('status', "Bạn đã xóa thành công");
            }
}
