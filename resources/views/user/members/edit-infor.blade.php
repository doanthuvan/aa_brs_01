@extends('user.master')
@section('title','Trang sửa thông tin cá nhân')
@section('content')
<div class="container">
    <div class="row">
        <div class="sidebar col-3">
            <br><br>
            <div class="avatar offset-2">
                <img src="{{url($users->avatar)}}"/>
            </div>
        </div>
        <div class="card-body mt-2">
            <form method="post" enctype="multipart/form-data" action = "{{route('update-infor')}}">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <fieldset>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Họ tên</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="{{$users->name}}" placeholder="Họ và tên" name="name">
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Ảnh đại diện</label>
                        <div class="col-lg-10">
                            <input type="file" name="filesTest">
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="{{$users->email}}" placeholder="Email" name="email">
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <a class="btn btn-default" href= "{{route('recommend-book')}}"">Hủy bỏ</a>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection