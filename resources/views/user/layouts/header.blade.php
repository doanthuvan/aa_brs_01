<!-- header-area-start -->
<header>
    <!-- header-top-area-start -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="language-area">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="account-area text-right">
                        <ul>
                            <li><a href="#">Tài khoản</a></li>
                            <li><a href="{{ action('Auth\LogoutController@getLogout') }}">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-top-area-end -->
    <!-- header-mid-area-start -->
    <div class="header-mid-area ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-area text-center logo-xs-mrg">
                        <a href="index.html"><img src="{{ url('img/logo/logo.png') }}" alt="logo" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-mid-area-end -->
    <!-- main-menu-area-start -->
    <div class="main-menu-area hidden-sm hidden-xs sticky-header-1" id="header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-area">
                        <nav>
                            <ul>
                            <li class="active"><a href="{{route('home')}}">Trang chủ<i class="fa fa-angle-down"></i></a> </li>
                                <li><a href="{{route('book')}}">Sách<i class="fa fa-angle-down"></i></a> </li>
                            <li><a href="#">Đề xuất sách mới<i class="fa fa-angle-down"></i></a> </li>
                                <li><a href="#">Thành viên<i class="fa fa-angle-down"></i></a> </li>
                                
                            </ul>
                        </nav>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <!-- main-menu-area-end -->
</header>
<!-- header-area-end -->