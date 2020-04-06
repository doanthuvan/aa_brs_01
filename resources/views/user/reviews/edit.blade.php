@extends('user.master')
@section('title', 'book-review')
@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}">
            <em class="fa fa-home"></em>
        </a></li>
        <li class=""><a href="{{route('book-detail',$reviews->book->id)}}">Sách</a></li>
        <li class="active">Chỉnh sửa bài đánh giá</li>
    </ol>
    <form method="post">
        <div class="card mt-5 col-10">
            <div class="card-header ">
                <h5 class="float-left">Đánh giá về cuốn sách {{$reviews->book->title}}</h5>
                <div class="clearfix"></div>
            </div>
            <div class="card-body mt-2">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Tiêu đề</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control"  value = "{{$reviews->title}}" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Nội dung đánh giá</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="15"  name="review" >{{$reviews->review_content}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button  type="reset" class="btn btn-default">Hủy bỏ</button>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>
                    </div>
                </fieldset>    
            </div>
        </div>
    </form>
</div>
@endsection
@section('after-scripts')
@endsection