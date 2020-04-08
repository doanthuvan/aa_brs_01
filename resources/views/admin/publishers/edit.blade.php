@extends('admin.master')
@section('title','chỉnh sửa user')
@section('content')
@include('admin.layouts.sidebar') 
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chỉnh sửa nhà xuất bản</h1>
        </div>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-6">
            <form method="post">
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
                        <label for="title" class="col-lg-2 control-label">Tên nhà xuất bản</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" value="{{ $publisher->publisher_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type ="reset" class="btn btn-default">Hủy bỏ</button>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div> 
@endsection