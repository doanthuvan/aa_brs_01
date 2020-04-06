@extends('user.master')
@section('title','Member')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($users as $user)
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            @if($user->avatar!='')
                            <img class="card-img-top" src="{{url($user->avatar)}}"  style="width:100%">
                            @endif
                            <h4 class="card-title text-center"><a href="{{route('person',$user->id)}}">{{$user->name}}</a></h4>
                        </div>
                    </div>
                </div>
        @endforeach   
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">{!! $users->links() !!}</div>
    </div>
</div>
@endsection