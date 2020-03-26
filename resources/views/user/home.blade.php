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
@endsection