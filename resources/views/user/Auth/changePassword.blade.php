<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Pass</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <a href="{{route('myAcount') }}" class = "btn btn-light">Trở về </a>
	<div class="container col-6">
        <h1>Thay đổi mật khẩu mới</h1>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
		<form method="post">
			@csrf
			Mật khẩu cũ: <input type="password" name="oldpassword" class="form-control">
			Mật khẩu mới: <input type="password" name="password" class="form-control">
			Xác nhận: <input type="password" name="confirm" class="form-control">
			<input type="submit" class="btn btn-danger btn-block">
		</form>
	</div>
</body>
</html>