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
                <div class="row">
                    @foreach ($user->books as $book)
                        <div class="col-xs-6 col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-body easypiechart-panel">
                                    <div class="product-img">
                                        <a  class="text-dark" href="{{route('book-detail', $book->id)}}">
                                            <img src="{{ url($book->image) }}" alt="book" class="primary" />
                                        </a>
                                    </div>
                                    <h4><a class="text-dark" href="{{route('book-detail', $book->id)}}">{{ $book->title }}</a></h4>
                                    <div class="easypiechart">
                                        <span class="author"> 
                                        Tác giả:
                                        @foreach ($book->authors as $author)
                                        {{ $author->author_name }}
                                         @endforeach</span>
                                    </div>
                                    <div class="favorite">
                                        @if($book->pivot->favorite == 1) <i class="fa fa-heart text-danger"></i>@endif
                                        @if($book->pivot->read == 1)<span class = "text-success"> Đã đọc </span> @endif
                                        @if($book->pivot->reading == 1) <span class = "text-info">Đang đọc </span>@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach     
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
