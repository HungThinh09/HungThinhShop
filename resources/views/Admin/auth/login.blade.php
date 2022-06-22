
<!DOCTYPE html>
<html lang="en">
@include('admin.layout.head')
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#">Đăng nhập hệ thống<b> HungShop</b></a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <p class="login-box-msg">pass: hung - 123456</p>
            @include('admin.layout.alert')
            <form action="{{route('logon')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control"  name="user" placeholder="Nhập User...">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password...">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="{{url('/')}}" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Trở về trang chủ
                </a>
            </div>
            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
@include('admin.layout.footer')
</body>
</html>
