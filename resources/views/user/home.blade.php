@extends('user.master')
@section('title', 'Home')

@section('content')
        <!-- slider-area-start -->
		<div class="slider-area">
			<div class="slider-active owl-carousel">
				<div class="single-slider pt-125 pb-130 bg-img" style="background-image:url(img/slider/1.jpg);">
				    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="slider-content slider-animated-1 text-center">
                                    <h1>Review sách hay</h1>
                                    <h2>Miễn phí</h2>
                                    <h3></h3>
                                     <a href="#">Tiện ích</a> 
                                </div>
                            </div>
                        </div>
				    </div>
				</div>
				<div class="single-slider slider-h1-2 pt-215 pb-100 bg-img" style="background-image:url(img/slider/2.jpg);">
				    <div class="container">
				        <div class="slider-content slider-content-2 slider-animated-1">
                            <h1>Bạn cô đơn ư?</h1>
                            <h2>Đừng lo lắng</h2>
                            <h3>Mọi cuốn sách đều sẵn sàng</h3>
                            <a href="#">kết thân với bạn!</a>
                        </div>
				    </div>
				</div>
			</div>
		</div>
		<!-- slider-area-end -->
		<!-- product-area-start -->
		<div class="product-area pt-95 xs-mb">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title text-center mb-50">
							<h2>SÁCH MỚI NHẤT</h2>
						</div>
					</div>
				</div>
                <!-- tab-area-start -->
				<div class="tab-content">
					<div class="tab-pane active" id="Audiobooks">
                        <div class="tab-active owl-carousel">
                            <!-- single-product-start -->
                            @foreach ($newUpdatedBooks as $book)
                            <div class="book-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="{{ url($book->image) }}" alt="book" class="primary" />
                                    </a>
                                </div>
                                <div class="product-details text-center">
                                    <h4><a href="{{route('book-detail', $book->id)}}">{{ $book->title }}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            <li>Nhà xuất bản:{{ $book->publisher->publisher_name }}</li>
                                           <li> Lượt xem :{{ $book->view }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<!-- product-area-end -->
		<!-- banner-area-start -->
		<div class="banner-area-5 mtb-95">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="banner-img-2">
							<a href="#"><img src="{{ url('img/banner/5.jpg') }}" alt="banner" /></a>
							<div class="banner-text">
								<h3>Nếu bạn biết đọc</h3>
								<h2>cả thế giới sẽ mở ra cho bạn</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- banner-area-end -->
		<!-- new-book-area-start -->
		<div class="new-book-area pb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title bt text-center pt-100 mb-30 section-title-res">
							<h2>ĐỌC NHIỀU NHẤT</h2>
						</div>
					</div>
				</div>
				<div class="tab-active owl-carousel">
                    @foreach ($highestViewedBooks as $book)
                    <div class="tab-total">
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
                      
                    </div>
                    @endforeach   
                </div>
			</div>
		</div>
@endsection