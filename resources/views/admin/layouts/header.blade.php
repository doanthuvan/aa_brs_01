
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="#"><span>Admin</span></a>
            <ul class="nav navbar-top-links navbar-right">
                {{-- @include('admin.layouts.notifications') --}}
            <li class="dropdown"><a id = "notifi"class="dropdown-toggle count-info" data-toggle="dropdown" href="{{route('adminnotification')}}" onclick = "markNotificationAsRead({{auth()->user()->unreadNotifications()->count()}})">
                <em class="fa fa-bell"></em><span class="label label-info">{{auth()->user()->unreadNotifications()->count()}}</span>
                </a>
                
                {{-- {{auth()->user()->Notifications->type}} --}}
                    @if(auth()->user()->unreadNotifications()->count()==0)
                    <ul class="dropdown-menu dropdown-alerts">
                <li>Không có thông báo mới</li>
            </ul>
                @else  
                  @include('admin.layouts.notifications')
                @endif
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>

