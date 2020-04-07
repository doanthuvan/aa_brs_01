@extends('admin.master')
@section('title','chỉnh sửa user')
@section('content')
@include('admin.layouts.sidebar') 
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chỉnh sửa sách</h1>
        </div>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <div class="">
                        @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                           
                        <div class="panel panel-default">
                            <div class="panel-body easypiechart-panel">
                                <img src="{{ url($book->image) }}" alt="book" class="primary" width="204" />         
                            </div>
                            <p>Danh mục: <span class="text-secondary">{{ $book->category->category_name }}</span></p>
                            <p>Nhà xuất bản: <span class="text-secondary">{{ $book}}</span></p>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
        <div class="col-6">
            <form method="post" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $book->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Nội dung</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="content" name="content">{{ $book->book_content }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Mô tả</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="content" name="des">{{ $book->book_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label"> Danh mục:</label> 
                      
                            <select name = "category">
                                @foreach ($categories as $category)
                                <option value={{$category->id}}>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label"> Nhà xuất bản:</label> 
                        
                            <select name = "publisher">
                                @foreach ($publishers as $publisher)
                                <option value={{$publisher->id}}>{{$publisher->publisher_name}}</option>
                                @endforeach
                            </select>
                            
                       
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label"> Tác giả:</label> 
                        
                            <select name = "author">
                                @foreach ($authors as $author)
                                <option value={{$author->id}}>{{$author->author_name}}</option>
                                @endforeach
                            </select>
                       
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-lg-2 control-label">Bìa sách</label>
                        <div class="col-lg-10">
                            <input type="file" name="filesTest" required="true">
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