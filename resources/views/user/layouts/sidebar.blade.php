<div class="sidebar col-3">
    <br><br>
    <div class="avatar">
        <img src="{{url($user->avatar)}}"/>
    </div>
    <div class="module">
        <h3 class="module__name">{{$user->name}}</h3>
        <br>
        <div class="module__date">
            <span><i class="fa fa-calendar"></i>Ngày đăng kí : {{$user->created_at}}</span>
        </div>
        <div class="module__emaik">
          <h4>Email : {{$user->email}}</h4>
        </div>
        <ul class="list-group list-group-flush">
            <a  class = "text-dark" href="{{route('followers',$user->id)}}"> Số người theo dõi :  {{$user->followings->count()}}<a>
             @if($user->id!=Auth::user()->id)
                @if($isfollower=="")
                   
                    <li  class="list-group-item "><a href="{{route('follow',$user->id)}}" class="btn btn-light"><i class="fa fa-plus-square"></i>  Theo dõi</a></li>
                @else
                    <li  class="list-group-item "><a href="{{route('unfollow',$user->id)}}" class="btn btn-light"><i class="fa fa-minus-circle"></i>  Bỏ theo dõi</a></li>
                    <li  class="list-group-item ">  <a  class = "text-dark"href="{{route('showreview',$user->id)}}" >Review sách</a></li>
                    @endif
            @else
            <li  class="list-group-item ">  <a class = #" >Nhật kí hoạt động</a></li>
       
            <li  class="list-group-item ">  <a class = "text-dark"href="#" >Quản lí tài khoản</a></li>
            <li  class="list-group-item ">  <a class = "text-dark" href="{{route('maganereview') }}" >Quản lí review </a></li>
            <li  class="list-group-item ">  <a class = "text-dark" href="{{route('managefollow') }}" >Quản lí theo dõi</a></li>
            <li  class="list-group-item ">  <a class = "text-dark" href="{{route('managefollow') }}" >Quản lí sách</a></li>
            @endif
        </ul>
    </div>
    </div>