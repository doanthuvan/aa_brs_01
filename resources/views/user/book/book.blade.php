@extends('user.master')
@section('title', 'book-detail')
@section('content')
<div class="container">
    <div class="container-fluid">
        @include('user.layouts.sidebar-book')   
        <div class="row ml-5">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <br><br>
                <img src="{{ url($book->image) }}" alt="">
                @if (Auth::check())
                    @if (empty($userRateBook))
                        <form class="vote" action="{{ route('book-detail-vote', ['id' => $book->id]) }}" method="POST">
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
                        <i>Bạn vote {{ $userRateBook->stars }} <i class="fa fa-star"></i></i>
                    @endif
                @endif
                @if( $book_user!="" && $book_user->read== 1 )
                    <h5 class=" text-danger">Bạn đã đọc cuốn sách</h5>
                @elseif($book_user!="" && $book_user->reading == 1)
                    <h5 class=" text-danger">Bạn đang đọc cuốn sách</h5>
                @else
                    <br>
                    <a  href="{{ route('book-read', ['id' => $book->id]) }}" class="btn btn-info col-12" >Đã đọc </a>
                    <a href="{{ route('book-reading', ['id' => $book->id]) }}" class="btn btn-success col-12">Đang đọc</a>
                @endif   
                @if($book_user!="" && $book_user->favorite ==1)
                    <h5 class=" text-danger">Đã thêm bộ sưu tập</h5>
                @else
                    <a href="{{ route('favorite-book', ['id' => $book->id]) }}" class="btn btn-danger col-12">Yêu Thích </a>
                @endif
            <a href="#" class="btn btn-primary col-12">Đánh Giá </a>
            </div>
            <div class="col" style="text-align:justify">
                <h3>{{ $book->title }}</h3>
                @if($book->rates->avg('stars') != 0)
                    @for($i = 1; $i <= $book->rates->avg('stars'); $i++)
                    <span> <i class="fa fa-star text-info fa-lg "></i><span>
                    @endfor
                    /({{  $book->rates->count()  }}đánh giá của bạn đọc)
                @else
                    <span>Chưa có đánh giá nào</span>
                @endif
                <br><br>
                <p>
                    <b>Tác giả:</b>
                    <span class="text-secondary">
                        @foreach ($book->authors as $author)
                            {{ $author->author_name }},
                        @endforeach
                    </span>
                </p>
                <p><b>Thể loại:</b> <span class="text-secondary">{{ $book->category->category_name }}</span></p>
                <p><b>Nhà xuất bản:</b> <span class="text-secondary">{{ $book->publisher->publisher_name }}</span></p>
                <div class="description mt-3">
                <h4><b>Mô tả:</b></h4> {{$book->book_description}}     
                </div>
            </div>
        </div>
        <div class="row ml-5">
            <div class="header col-12 ">
                <h3 class = text-danger><b>Tóm tắt nội dung sách:</b></h3>
            </div>
            <br>
            <div class="description mt-3 ">
                {{$book->book_content}}
            </div>
        </div>
        <div class="row ml-5">
            <h3 class = text-dark><b>Review của bạn đọc</b></h3>
            @foreach($reviews as $review)
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-3 ">
                    <div class="container-fluid comment">
                        <div class="row mt-2">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1">
                                @if (!empty($review->user->avatar))
                                    <img src="{{ url( $review->user->avatar) }}" alt="">
                                @else
                                    <img src="{{ config('constant.avatar_empty') }}" alt="">
                                @endif
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-11">
                                <p class="gmail_comment">
                                    <b>{{ $review->user->name }}</b>
                                    <span class="ml-3 text-secondary">{{ $review->created_at }}</span>
                                </p>
                                <div class="comment_content mt-1 post-summary">
                                <a class ="text-dark" href="{{route('review-detail',$review->id)}}"> {{ $review->title}} </a>
                                <form>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                    <input type="hidden" name="comment_review" value="{{ route("likeIt")}} " id="likeIt">
                                    <a id="submitlike" class="{{$review->isLiked()?"text-primary":""}} btn fa fa-thumbs-up" onclick="likeIt('{{$review->id}}',this)"></a> <span class = "count_like">{{$review->likes()->count()}}</span>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('after-scripts')
    <script src="{{url('js/user.js')}}"></script>
@endsection
