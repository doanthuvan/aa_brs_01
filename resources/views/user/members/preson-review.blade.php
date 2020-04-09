@extends('user.master')
@section('title','Trang cá nhân')
@section('content')
<div class="container">
    <div class="row">
        @include('user.layouts.sidebar')
        <div class="content col-8">
            <div class="tab-content">
                <div class="tab-pane active">
                    <h1>Kệ sách</h1>
                    <hr>
                    <div class="review-book">
                        @foreach ($reviews as $review)
                            <br>
                            <div class="row">
                                <div class="book-wrapper col-3">
                                    <div class="product-img ">
                                        <a href="">
                                        <img src="{{url($review->book->image)}}" alt="book" class="primary" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-details col-9">
                                    <div class="product-price">
                                        <ul>
                                            <li><a href="{{route('show-review',$review->id)}}" class ="text-dark">{{ $review->title}}</a> </li>    
                                        </ul>
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
</div>
@endsection
