@extends('admin.master')
@section('title','Nhật kí hoạt động')
@section('content')
@include('admin.layouts.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tác giả</h1>
            <a  href = "{{ action('Admin\AdminController@createauthor') }}"class="btn btn-info float-left mr-2">Thêm mới</a>
        </div>
    </div><!--/.row-->
    <br>
    <div class="panel panel-container">
        <div class="row">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
             @endif
            @foreach ($authors as $author)
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding">
                        <h4>{{$author->author_name}}</h4>
                    <a href="{{action('Admin\AdminController@editauthor', $author->id)}}" class="btn btn-info float-left mr-2">Sửa</a>
                        <form method="post" action="{{action('Admin\AdminController@destroyauthor', $author->id)}}" class="float-left">
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
 </div>    
@endsection