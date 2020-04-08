@extends('user.master')
@section('title', 'recommend-book')
@section('content')
    <div class="card mt-5">
        <div class="card-header ">
            <h5 class="float-left">Đề xuất sách mới</h5>
            <div class="clearfix"></div>
        </div>
        <div class="card-body mt-2">
        <form method="post"  action = "{{route('postrecommend-book')}}">
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
                        <label for="title" class="col-lg-2 control-label">Tên sách</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" placeholder="Tên sách" name="name">
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Tác giả</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" placeholder="Tác giả" name="author">
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Nội dung</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                        </div>
                    </div>

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