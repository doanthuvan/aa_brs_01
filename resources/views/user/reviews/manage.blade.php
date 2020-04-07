@extends('user.master')
@section('title', 'book-review')
@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Các bài đánh giá của bạn</li>
    </ol>
    <div class="row">
        <div class="content">
            <div class="tab-content">
                <div class="tab-pane active">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                     @endif
                    <h1>Bạn có {{$reviews->count()}} bài đánh giá</h1>
                    <hr>
                    @foreach ($reviews as $review)
                        <div class="row">
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                            <div class="book-wrapper col-2">
                                <div class="product-img ">
                                    <a href="">
                                        <img src="{{url($review->book->image)}}" alt="book" class="primary" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-details col-6">
                                <h4><a href=""></a></h4>
                                <div class="book">
                                        <a href="#" class ="text-dark">{{ $review->title}}</a>
                                        <a href="{{ route('editReview', $review->id) }}" class="btn btn-info float-left mr-2">Sửa</a>
                                        <form method="post" action="{{action('User\BookController@destroyReview', $review->id) }}" class="float-left">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-warning">Xóa</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection