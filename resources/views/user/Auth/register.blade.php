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
    <div class="container">
        <div class="card mt-5">
            <div class="card-header ">
                <h5 class="float-left">Đăng kí tài khoản</h5>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-lg-12 control-label">Tên</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="name" placeholder="tên đăng nhập" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Ảnh đại diện</label>
                        <div class="col-lg-10">
                            <input type="file" name="filesTest" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-lg-12 control-label">Email</label>
                        <div class="col-lg-12">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-lg-12 control-label">Mật khẩu</label>
                        <div class="col-lg-12">
                            <input type="password" class="form-control"  name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-lg-12 control-label">Xác nhận mật khẩu</label>
                        <div class="col-lg-12">
                            <input type="password" class="form-control"  name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Hủy bỏ</button>
                            <button type="submit" class="btn btn-primary">Đăng kí</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>