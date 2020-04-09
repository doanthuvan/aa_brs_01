<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<?php //Hiển thị thông báo thành công?>
@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
@if ($errors->any())
	<div class="alert alert-danger alert-dismissible" role="alert">
		<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
<div class="container" style="margin-top: 10%">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<form role="form" action="{{ url('users/login') }}" method="POST">
						{!! csrf_field() !!}
						<fieldset>
							<div class="row">
								<div class="center-block">
									<img class="profile-img" src="{{url('img/user_yellow.png')}}" alt="User" width="100">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-10  col-md-offset-1 ">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
											<input class="form-control" placeholder="Email" name="email" type="text" value="{{ old('email') }}" autofocus>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
											<input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
										</div>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-lg btn-primary btn-block" value="Đăng nhập">
									</div>
									
								</div>
							</div>
						</fieldset>
					</form>
					<a  class="text-center offset-4" href="{{route('forgotpassword') }}">Quên mật khẩu</a>
					<h4> Bạn chưa có tài khoản?Đăng kí ngay</h4>
					<a  class="btn btn-lg btn-primary btn-block col-6 offset-3" href="{{route('getRegister') }}">Đăng kí</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>