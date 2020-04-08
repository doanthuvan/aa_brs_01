@extends('admin.master')
@section('title','Nhật kí hoạt động')
@section('content')
@include('admin.layouts.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->
    
    <div class="row">
        @foreach ($users as $user)
        <div class="col-xs-6 col-md-3">
            @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    @if($user->avatar!='')
                    <img class="card-img-top" src="{{url($user->avatar)}}"  style="width:100%">
                    @endif
                    <h4>{{$user->name}}</h4>
                    @if($user->role!=1)
                    <h4>Thành viên</h4>
                    @else <h4>Quản trị viên</h4>
                    @endif
                    <a href="{{ action('Admin\AdminController@edituser', $user->id) }}" class="btn btn-info float-left mr-2">Sửa</a>
                    <form method="post" action="{{ action('Admin\AdminController@destroyuser', $user->id) }}" class="float-left">
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