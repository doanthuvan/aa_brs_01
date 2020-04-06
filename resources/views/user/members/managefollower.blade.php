@extends('user.master')
@section('title','Danh sách người theo dõi')
@section('content')
<div class="container">
    <div class="content col-8">
        <a href="{{ URL::previous() }}" class = "btn btn-light">Trở về </a>
        <div class="tab-content">
            <div class="tab-pane active">
            <h1> Bạn đang theo dõi</h1>
                <hr>
                @foreach ( $user->followers as  $follows)
                   <div class="row">
                        <div class="card col-3">
                            @if($follows->avatar!='')
                                <img class="card-img-top" src="{{url($follows->avatar)}}"  style="width:100%">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title "><a href="{{route('person',$follows->id)}}" class = "text-dark">{{$follows->name}}</a></h4>
                                <a href="{{route('unfollow',$follows->id)}}" class="btn btn-light"><i class="fa fa-minus-circle"></i>  Bỏ theo dõi</a>
                            </div>
                        </div>   
                    </div> 
                @endforeach  
            </div>
        </div>
    </div>
</div>    
@endsection