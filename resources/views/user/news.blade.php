@extends('user.master')
@section('title', 'Home')

@section('content')
<!-- breadcrumbs-area-end -->
<!-- blog-main-area-start -->
<br><br>
<div class="archive-post-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">
                <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
                    <div class="section-heading">
                        <h5>Reviews sách</h5>
                    </div>

                    <!-- Single Catagory Post -->
                    @foreach ($news as $new)
                    <div class="author-destils mb-30">
                        <div class="author-left">
                            <div class="author-img">
                                <a href="#"><img src="{{url($new->user->avatar)}}" alt="man" /></a>
                            </div>
                            <div class="author-description">
                                <p>Đăng bởi: 
                                    <a href="#"><span>{{$new->user->name}}</spam>
                                </p>
                                <span>{{$new->user->created_at}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-catagory-post d-flex flex-wrap">
                        <!-- Thumbnail -->
                        <div class="post-thumbnail bg-img">
                            <a href="{{route('book-detail',$new->book->id)}}"><img src="{{url($new->book->image)}}" alt="blog" /></a>
                        </div>

                        <!-- Post Contetnt -->
                        
                        <div class="post-content">
                            
                                <div class="single-blog-title">
                                    <h4>{{$new->title}}</h4>
                                </div>
                                <div class="post-meta-2">
                                    <span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{$new->likes()->count()}}</span>
                                    <span><i class="fa fa-comments-o" aria-hidden="true"></i> {{$new->comments()->count()}}</span>
                                </div>
                                <div class="blog-comment-readmore">
                                    <div class="blog-readmore">
                                        <a href="{{route('show-review',$new->id)}}">Đọc thêm<i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                        </div>
                    </div>
                    @endforeach
               
                    <!-- Pagination -->
                    <nav>
                        <ul class="pagination">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
                        </ul>
                    </nav>

                </div>
            </div>
            
            <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                <div class="sidebar-area bg-white mb-30 box-shadow">
                    

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
            </div>
           
        </div>
    </div>
</div>
@endsection