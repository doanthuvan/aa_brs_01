@extends('user.master')
@section('title', 'Home')

@section('content')
<!-- breadcrumbs-area-end -->
<!-- blog-main-area-start -->
<br><br>
<div class="mag-breadcrumb py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item active"><a href="#">Tin tức</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Post Details Area Start ##### -->
<section class="post-details-area">
    <div class="container">

        <div class="row justify-content-center">
            <!-- Post Details Content Area -->
            <div class="col-12 col-xl-8">
                <div class="post-details-content">
                    <div class="blog-content">
                    <h4 class="post-title">{{$news->title}}</h4>
                        <!-- Post Meta -->

                        <div class="row">
                            {!!$news->content!!}
                        </div>

                      

                     

                        <!-- Like Dislike Share -->
                        
                    </div>
                </div>

               
            </div>
     

                        
              
            <!-- Sidebar Widget -->
            <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                <div class="sidebar-area bg-white mb-30 box-shadow">
                    <!-- Sidebar Widget -->

                    <!-- Sidebar Widget -->
                    <!-- Sidebar Widget -->
                    

                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget p-30">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Tổng hợp</h5>
                        </div>
                        @foreach ($news_ad as $new)
                        <div class="single-youtube-channel d-flex">
                            <div class="youtube-channel-thumbnail">
                                <img src="{{url($new->img)}}" alt="post" />
                            </div>
                            <div class="youtube-channel-content">
                            <a href="{{route('newsdetail',$new->id)}}" class = "text-dark"> {{$new->title}}</a>
                            </div>
                        </div>
                @endforeach 

                </div>

                    <!-- Sidebar Widget -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Post Details Area End ##### -->

@endsection