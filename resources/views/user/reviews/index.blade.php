@extends('user.master')
@section('title', 'book-review')
@section('content')
<div class="container">
    <div class="row">
            <div class="col-2">
                <br><br>
                <img src="{{ url($reviews->book->image) }}" alt="">
               
                <h5 class="mt-3">Vote {{ '(' . $reviews->book->rates->count() . ')' }}</h5>
                @if (Auth::check())
                    @if (empty($userRateBook->stars))
                    <form class="vote" action="{{ route('book-detail-vote', ['id' => $reviews->book->id]) }}" method="POST">
                        <p>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="checkbox" name="star[]" value="1" class="star">
                            <input type="checkbox" name="star[]" value="1" class="star">
                            <input type="checkbox" name="star[]" value="1" class="star">
                            <input type="checkbox" name="star[]" value="1" class="star">
                            <input type="checkbox" name="star[]" value="1" class="star">
                        </p>
                        <button type="submit" class="btn btn-sm btn-primary mt-3">Vote</button>
                        @if ($errors->has('star'))
                            <div class="alert alert-danger mt-2">
                            {{ $errors->first('star') }}
                            </div>
                        @endif
                    </form>
                    @else
                        <i>Bạn đã đánh giá {{ $userRateBook->stars }} <i class="fa fa-star"></i></i>
                    @endif
                @else
                    <p><i>Hãy đăng nhập để đánh giá</i></p>
                @endif
            </div>
        
        <div class="card mt-5 col-10">
            <div class="card-header ">
            <p >Cuốn sách : {{$reviews->book->title}}</p>
            @if($reviews->book->rates->avg('stars') != 0)
            @for($i = 1; $i <= $reviews->book->rates->avg('stars'); $i++)
            <span> <i class="fa fa-star text-info fa-lg "></i><span>
            @endfor
            /({{  $reviews->book->rates->count()  }}đánh giá của bạn đọc)
        @else
            <span>Chưa có đánh giá nào</span>
        @endif
        <div class="clearfix"></div>
            </div>
        <div class="card-body mt-2">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="form-group">
                 <h2>{{$reviews->title}}</h2>
             </div>
                 </div>
            <div class="form-group">
                 <label for="content" class="col-lg-2 control-label">Nội dung đánh giá</label>
                    <div class="col-lg-10">
                         <span>{{$reviews->review_content}}</span>
                    </div>
             </div>
             <form>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                <input type="hidden" name="comment_review" value="{{ route("likeIt")}} " id="likeIt">
                <a id="submitlike" class="{{$reviews->isLiked()?"text-primary":""}} btn fa fa-thumbs-up" onclick="likeIt('{{$reviews->id}}',this)"></a> <span class = "count_like">{{$reviews->likes()->count()}}</span>
             {{-- <i  class="fa fa-thumbs-up btn btn-xs fa-lg"  id="submitlike" onclick="likeIt('{{$reviews->id}}',this)" > <span class = "count_like">{{$reviews->likes()->count()}}</span></i> --}}
             </form> <p >Người đánh giá: {{$reviews->user->name}}</p>
            <div class="product-info-area mt-80">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#Reviews" data-toggle="tab">Bình luận</a></li>
                </ul>
            </div>
                <div class="reviewcontent">
                <div class="comment-form-container">
                    <form id="frm-comment">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <input type="hidden" name="comment_review" value="{{ route("comment_review",$reviews->id)}} " id="comment_review">
                        <input type="hidden" name="comment_review" value="{{ route("create-comment")}} " id="create-comment">
                        <input type="hidden" name="review_id" value="{{$reviews->id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="input-row">
                            <input type="hidden" name="comment_id" id="commentId"
                                placeholder="Name" /> 
                        </div>
                        <div class="input-row">
                            <textarea class="input-field" type="text" name="comment"
                                id="comment" placeholder="Viết bình luận">  </textarea>
                        </div>
                        <div>
                            <input type="button" class="btn-submit" id="submitButton"
                                value="Bình luận" /><div id="comment-message">Bạn đã trả lời bình luận !</div>
                        </div>
            
                    </form>
                </div>
                <div id="output"></div>
            </div>
             
        </div>
    </div>
</div>
@endsection
@section('after-scripts')

    <script src="{{url('js/user.js')}}"></script>

@endsection