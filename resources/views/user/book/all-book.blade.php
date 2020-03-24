@extends('user.master')
@section('title', 'book-publisher')

@section('content')
        <!-- shop-main-area-start -->
		<div class="shop-main-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="shop-left">
							<div class="section-title-5 mb-30">
								<h2>DANH MỤC</h2>
							</div>
							<div class="cate">	
                                <ul class="list-group list-group-flush">
                                     @foreach ($cate as $ca)
                                        <li  class="list-group-item"> <a href="#" class="title" id = "myulli">{{$ca->category_name}}</a> </li>
                                     @endforeach
                                 </ul>           
							</div>
							<div class="section-title-5 mb-30">
								<h2> NHÀ XUẤT BẢN</h2>
							</div>
							<div class="publiser-detail">
                                <ul class="list-group list-group-flush">
                                    @foreach ($pub as $pub)
                                    <li  class="list-group-item ">  <a href="{{ route('publiser-detail', $pub->id) }}" >{{$pub->publisher_name}}</a></li>
                                 @endforeach
                                  </ul>
							</div>
							<div class="left-title-2 mb-30">
								<h2>Compare Products</h2>
								<p>You have no items to compare.</p>
							</div>
							<div class="left-title-2">
								<h2>My Wish List</h2>
								<p>You have no items in your wish list.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
						<div class="section-title-5 mb-30">
                            <h2><a href = "{{route('book')}}">Book</a></h2>
                        </div>
                            <form class="form-inline" action="{{ action('User\BookController@search') }}">        
                                <button type="submit" class="btn btn-warning mb-2"  >Tìm kiếm</button>
                                <input class="form-control mb-2 mr-sm-2" type="text" id = "search" name = "search" placeholder="Nhập thông tin tìm kiếm..." />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
						<!-- tab-area-start -->
						<div class="tab-content">
							<div class="tab-pane active" id="th">
							    <div class="row">
                                    @foreach ($books as $book)
                                    {{-- {{$book}} --}}
							        <div class="col-lg-3 col-md-4 col-sm-6">
                                        <!-- single-product-start -->
                                      
                                        <div class="book-wrapper mb-40">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img src="{{ url($book->image) }}" alt="book" class="primary" />
                                                </a>
                                            </div>
                                            <div class="product-details text-center">
                                                <h4><a href="{{route('book-detail', $book->id)}}">{{ $book->title }}</a></h4>
                                                <div class="product-price">
                                                    <ul>
                                                        <li>Nhà xuất bản : {{ $book->publisher->publisher_name }}</li>
                                                        <li>Lượt xem : {{ $book->view }}  </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-end -->
                                    </div>
                                    @endforeach     
							    </div>
							</div>
						</div>
						<!-- tab-area-end -->
						<!-- pagination-area-start -->
						<div class="pagination-area mt-50">
							<div class="page-number">
                                {{ $books->links() }}
							</div>
						</div>
						<!-- pagination-area-end -->
					</div>
				</div>
			</div>
        </div>
@endsection
