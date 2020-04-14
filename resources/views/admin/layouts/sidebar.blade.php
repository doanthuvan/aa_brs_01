<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">Admin</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu"><i class="fa fa-accusoft"></i>
        <li><a href="{{route('index')}}"><em class="fa fa-clone">&nbsp;</em> Dashboard</a></li>
        <li><a href="{{route('showusers')}}"><em class="fa fa-users">&nbsp;</em> Thành viên</a></li>
        <li><a href="{{route('showbooks')}}"><em class="fa fa-book">&nbsp;</em> Sách</a></li>
        <li><a href="{{route('showcategories')}}"><em class="fa fa-bar-chart">&nbsp;</em> Danh mục</a></li>
        <li><a href="{{route('publishers')}}"><em class="fa fa-print">&nbsp;</em> Nhà xuất bản</a></li>
        <li><a href="{{route('authors')}}"><em class="fa fa-amazon">&nbsp;</em> Tác giả</a></li>
        <li><a href="{{route('requestnewbooks')}}"><em class="fa fa-clone">&nbsp;</em> Yêu cầu sách mới</a></li>
        <li><a href="{{route('new')}}"><i class="fa fa-book">&nbsp;</i> Tin tức</a></li>
        <li><a href="{{ route('logout') }}"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
    </ul>
</div>