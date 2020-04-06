@extends('user.master')
@section('title','Trang cá nhân')
@section('content')
<div class="container">
    <div class="row">
    @include('user.layouts.sidebar')
    <div class="content col-8">
        <div class="tab-content">
            <div class="tab-pane active">
                <h1>Số người đang theo dõi </h1>
                <hr>
                <div class="row">
                       @foreach ($user->followings as $userFollow)
                            <div class="col-6">
                                <div class="card col-6">
                                    @if($userFollow->avatar!='')
                                        <img class="card-img-top" src="{{url($userFollow->avatar)}}"  style="width:100%">
                                    @endif
                                    <div class="card-body">
                                        <h4 class="card-title "><a href="{{route('person',$userFollow->id)}}" class = "text-dark">{{$userFollow->name}}</a></h4>
                                    </div>
                                </div>
                            </div>      
                        @endforeach  
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
