@extends('user.master')
@section('title', 'book-review')
@section('content')
<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">
                <em class="fa fa-home"></em>
            </a></li>
            <li class=""><a href="{{route('book-detail',$book->id)}}">Sách</a></li>
            <li class="active">Review sách</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <form method="post" action = "{{route('store-review',$book->id)}}">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
                <br><br>
                <img src="{{ url($book->image) }}" alt="">   
            </div>
            <div class="card mt-5 col-10">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-header ">
                    <h5 class="float-left">Đánh giá về cuốn sách</h5>
                    @foreach ($errors->all() as $error)
                         <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
                <div class="card-body mt-2"> 
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>
                        <div class="form-group">
                            <label for="title" class="col-lg-2 control-label">Tiêu đề</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="title" placeholder="tiêu đề" name="title" value="">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="content" class="col-lg-2 control-label">Nội dung đánh giá</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="15" name="review"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button class="btn btn-default">Hủy bỏ</button>
                                <button type="submit" class="btn btn-primary">Đánh giá</button>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('after-scripts')
@endsection