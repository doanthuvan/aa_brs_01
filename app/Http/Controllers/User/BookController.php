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
use App\Models\Comment;
use App\Models\News;
class BookController extends Controller
{
     public function index()
     {
        $books = Book::with('publisher', 'rates')->orderBy('id', 'DESC')->paginate(16);
        $news_ad = News::all();
       
       
        return view('user.book.all-book', compact('books','news_ad'));

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
        $news_ad = News::all();
        return view('user.book.all-book', compact('books','news_ad'));
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
    public function createReview(Request $request, $id)
    { 
        try {
            $book = Book::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }
        return view('user.reviews.create',compact('book'));
    }
    public function storeReview(Request $request, $id)
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
        return  redirect()->back()->with('status', 'Cảm ơn bạn đã thêm bài đánh giá cho cuốn sách');
    }
    public function editReview(Request $request, $id)
    { 
        $reviews = Review::with('user', 'comments', 'book')
            ->where('id', $id)
            ->orderBy('created_at', 'DESC')
            ->first();
       
        return view('user.reviews.edit',compact('reviews'));

    }
    public function updateReview($id, Request  $request)
			{
			    $reviews = Review::where('id', $id)->firstOrFail();
			    $reviews->title = $request->get('title');
			    $reviews->review_content = $request->get('review');
                $reviews->save();
			    return redirect(action('User\BookController@editReview',$id))->with('status', 'Bạn đã cập nhật thành công');

            }
    public function destroyReview($id, Request  $request){
        $reviews = Review::where('id', $id)->firstOrFail();
		$comments =$reviews->comments()->delete();
        $reviews->delete();
		return redirect('/maganereview')->with('status', 'Bạn đã xóa thành công');
    }
    public function showReview(Request $request,$id){
        $reviews = Review::with('user', 'comments', 'book')
            ->where('id', $id)->first();
            $id_book = $reviews->book->id;
        if (Auth::check()) {
                $userRateBook = Rate::where([
                    ['user_id', '=', Auth::user()->id],
                    ['book_id', '=', $id_book],
    
                ])->first();
            }else {
                $userRateBook = "";
            }
        return view('user.reviews.index',compact('reviews','userRateBook'));
    }
        public function showComment(Request $request,$id){
        
            $comments = Comment::with('user')->where('review_id',$id )->get();
            return json_encode($comments) ;
        }
        public function createcomment(Request $request ){
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
        public function store(Request $request)
    {
        $request->validate([
            'post' => 'required'
        ]);

        $data = $request->except('_token');

        $post = Review::create($data);

        return redirect()->route('post.show', $post->id);
    }
        public function uploadImage(Request $request)
    {     dd($request->file('file'));
        $imgpath = $request->file('file')->store('post', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);
    }
  
    
    
    }


