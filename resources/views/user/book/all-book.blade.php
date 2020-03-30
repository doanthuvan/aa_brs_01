@extends('user.master')
@section('title', 'book-publisher')
@section('content')
<div class="container">
	<div class="shop-main-area mb-70">
        @include('user.layouts.sidebar-book')   
        <div  class="section-title-5 mb-30">
            <h2><a  class="text-dark"href = "{{route('book')}}">Sách ({{$books->count()}})</a></h2>
            <form class="form-inline" action="{{ action('User\BookController@search') }}">        
                <button type="submit" class="btn btn-warning mb-2"  >Tìm kiếm</button>
                <input class="form-control mb-2 mr-sm-2" type="text" id = "search" name = "search" placeholder="Nhập thông tin tìm kiếm..." />
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
                <div class="row">
                    @foreach ($books as $book)
                        <div class="col-xs-6 col-md-3">
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
                                         <p>NXB:{{ $book->publisher->publisher_name }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach     
                </div>
				<div class="row">
						<div class="pagination-area mt-50">
							<div class="page-number">
                                {{ $books->links() }}
							</div>
						</div>
				</div>
			</div>
        </div>
@endsection
