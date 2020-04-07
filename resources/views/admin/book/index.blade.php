@extends('admin.master')
@section('title','Nhật kí hoạt động')
@section('content')
@include('admin.layouts.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sách</h1>
            <a  href = "{{ action('Admin\AdminController@createbook') }}"class="btn btn-info float-left mr-2">Thêm mới</a>
        </div>
    </div><!--/.row-->
    <br>
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @foreach ($books as $book)
        <div class="col-xs-6 col-md-3">
            @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
               
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <img src="{{ url($book->image) }}" alt="book" class="primary" width="204"  height="304" />
                    <h4><a href="{{route('book-detail', $book->id)}}">{{ $book->title }}</a></h4>
                    <a href="{{ action('Admin\AdminController@editbook', $book->id) }}" class="btn btn-info float-left mr-2">Sửa</a>
                    <form method="post" action="{{ action('Admin\AdminController@destroybook', $book->id) }}" class="float-left">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <button type="submit" class="btn btn-warning">Xóa</button>
                        </div>
                    </form>
        
                </div>
            </div>
        </div>
        @endforeach
 </div>    
@endsection