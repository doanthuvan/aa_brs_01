@extends('user.master')
@section('title', 'recommend-book')
@section('content')
<div class="container">
    <div class="container col-md-8 col-md-offset-2 mt-5">
        <a  class="btn btn-info"href="{{route('recommend-book')}}">Đề xuất sách mới</i></a>
        <div class="card">
            <div class="card-header ">
                <h5 class="float-left">Danh sách cuốn sách bạn đã giới thiệu</h5>
                <div class="clearfix"></div>
            </div>
            <div class="card-body mt-2">
                @if ($requestNewbooks->isEmpty())
                    <p> Bạn chưa gửi yêu cầu nào.</p>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @else
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
                       @foreach($requestNewbooks as $requestNewbook)
                        <tr>
                            <td>{{ $requestNewbook->book_name }}</td>
                            <td>
                               {{ $requestNewbook->author }} 
                            </td>
                            <td>
                                {{ $requestNewbook->created_at }} 
                             </td>
                            
                            <td>{{ $requestNewbook->status ? 'Đang xử lí' : 'Đang được phê duyệt' }}</td>
                        </tr>
                    @endforeach    
                        </tbody>              
                    </table>
                    <div class="row">
                       <div class="col-md-4 col-md-offset-4">{!! $requestNewbooks->links() !!}</div>
                     </div>   
                @endif
            </div>
        </div>     
    </div>
</div>
@endsection