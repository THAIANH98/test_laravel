<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Đăng nhập</b></a><br>

        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                {{--                <p class="login-box-msg">Sign in to start your session</p> --}}
                @include('alert')
                <form action="{{ route('login_store') }}" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    @include('footer')
</body>

</html>
