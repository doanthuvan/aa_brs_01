
<ul class="dropdown-menu dropdown-alerts">
    @foreach ($notification as $notification)
    <?php $stringnotifi = json_decode($notification->data) ;?>
<li><a href="{{route('requestnewbooks')}}">
        <div><em class="fa fa-envelope"></em> {{$stringnotifi->user->name}} đã đề xuất một cuốn sách mới
            <span class="pull-right text-muted small">3 mins ago</span></div>
    </a></li>
         @endforeach
</ul>

