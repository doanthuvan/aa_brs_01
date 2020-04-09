<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Pass</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container col-6">
		<h1>Thay đổi mật khẩu mới</h1>
		<form action="{{ route('newPass') }}" method="post">
			@csrf
			<input type="text" name="token" value="{{ $info }}" hidden="">
			Mật khẩu mới: <input type="password" name="password" class="form-control">
			Xác nhận: <input type="password" name="confirm" class="form-control">
			<input type="submit" class="btn btn-danger btn-block">
		</form>
	</div>
</body>
</html>