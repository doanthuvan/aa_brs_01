@extends('user.master')
@section('title','Trang đăng nhập')
@section('content')
<div class="container">
    <div class="row">
        <div class="sidebar col-3">
            <br><br>
            <div class="avatar offset-2">
                <img src="{{url($users->avatar)}}"/>
            </div>
        </div>
        <div class="content col-8">
            <div class="section">
                <h2 class="section__title">
                    <i class="fa fa-briefcase circle circle--large"></i>
                    <span>Thông tin cá nhân</span>
                </h2>
                <div class="section__content">
                    <div class="module">
                        <h3 class="module__name">Họ tên : {{$users->name}}</h3>
                        <br>
                        <div class="module__date">
                            <span><i class="fa fa-calendar"></i>Ngày đăng kí : {{$users->created_at}}</span>
                        </div>
                        <div class="module__emaik">
                        <h4>Email : {{$users->email}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <a href="{{route('listrecommend-book')}}"  class=" btn btn-success">Giới thiệu sách mới</a>
                        <a href="{{route('edit-infor')}}" class=" btn btn-primary">Chỉnh sửa thông tin</a>
                        <a href="{{route('changepassword')}}" class=" btn btn-info">Đổi mật khẩu</a>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection