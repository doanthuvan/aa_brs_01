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
    
    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-users"></em>
                    <div class="large">{{$users->count()}}</div>
                        <div class="text-muted">Thành viên</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><i class="fa fa-book"></i>
                        <div class="large">{{$books->count()}}</div>
                        <div class="text-muted">Sách</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-orange panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-amazon">&nbsp;</em>
                        <div class="large">{{$authors->count()}}</div>
                        <div class="text-muted">Tác giả</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-red panel-widget ">
                    <div class="row no-padding"><em class="fa fa-bar-chart">&nbsp;</em>
                        <div class="large">{{$categories->count()}}</div>
                        <div class="text-muted">Danh mục</div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>
@endsection