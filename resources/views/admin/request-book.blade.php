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
            <li class="active">Yêu cầu sách mới</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="container col-md-8 col-md-offset-2 mt-5">
            <div class="card">
                <div class="card-header ">
                    <div class="clearfix"></div>
                </div>
                <div class="card-body mt-2">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($requestnewbooks->isEmpty())
                        <p> Chưa có sách cân phê duyệt</p>
                    
                    @else
                    <p> Sách chưa được phê duyệt</p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Tên sách</th>
                                <th>Tác giả</th>
                                <th>Ngày gửi</th>
                                <th>Tình trạng</th>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach($requestnewbooks as $requestNewbook)
                            <tr>
                                <td>{{ $requestNewbook->book_name }}</td>
                                <td>
                                   {{ $requestNewbook->author }} 
                                </td>
                                <td>
                                    {{ $requestNewbook->created_at }} 
                                 </td>
                                
                                <td>{{ $requestNewbook->status ? 'Đã phê duyệt' : 'Chưa phê duyệt' }}</td>
                                <td> 
                                    <a href="{{route('approveds',$requestNewbook->id)}}" class="btn btn-info float-left mr-2">Phê duyệt</a>
                                    <form method="post" class="float-left" action ="{{ action('Admin\AdminController@destroyrequest', $requestNewbook->id) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div>
                                        <button type="submit" class="btn btn-warning col-2">Xóa</button>
                                    </div>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                        
                      
                            </tbody>
                            
                           
                        </table>
                    @endif
                </div>
            </div>
            
        </div>
        <div class="container col-md-8 col-md-offset-2 mt-5">
             <div class="card">
                 <div class="card-header ">
                     <div class="clearfix"></div>
                 </div>

                 <div class="card-body mt-2">
                     @if ($approveds->isEmpty())
                         <p> Chưa có sách được phê duyệt.</p>
                     @else
                     <p> Sách đã được phê duyệt</p>
                         <table class="table">
                             <thead>
                             <tr>
                                 <th>Tên sách</th>
                                 <th>Tác giả</th>
                                 <th>Ngày gửi</th>
                                 <th>Tình trạng</th>
                             </tr>
                             </thead>
                             <tbody>
                            @foreach($approveds as $requestNewbook)
                             <tr>
                                 <td>{{ $requestNewbook->book_name }}</td>
                                 <td>
                                    {{ $requestNewbook->author }} 
                                 </td>
                                 <td>
                                     {{ $requestNewbook->created_at }} 
                                  </td>
                                 
                                 <td>{{ $requestNewbook->status ? 'Đã phê duyệt' : 'Chưa phê duyệt' }}</td>
                             </tr>
                         @endforeach
                              
                             </tbody>
                             
                            
                         </table>
                     @endif
                 </div>
             </div>
             
         </div>
    </div>
    
@endsection