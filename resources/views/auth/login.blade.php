<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Đăng Nhập</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('auth/assets/fonts/icomoon/style.css') }}">

    <!-- <link rel="stylesheet" href="{{ asset('auth/assets/css/owl.carousel.min.css') }}"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('auth/assets/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('auth/assets/css/style.css') }}">
</head>

<body>
    @include('notification.toastr')
    <div class="half">
        <div class="bg order-1 order-md-2" style="background-image: url('auth/assets/images/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="form-block">
                            <div class="text-center mb-5">
                                <h3><strong>SEOUL</strong> SPA</h3>
                            </div>
                            <div class="notifications">
                                <!-- Hiển thị thông báo lỗi -->

                                <!-- Trường hợp thông tin đăng nhập không hợp lệ -->
                                @if ( Session::has('error') )
                                <span>{{ Session::get('error') }}</span>
                                @endif

                                <!-- Validations -->
                                @if ($errors->any())

                                @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span>
                                @endforeach
                                @endif

                            </div>
                            <!-- End hiển thị thông báo lỗi -->
                        </div>
                        <form role="form" action="{{ url('/login') }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group first">
                                <label for="username">Email</label>
                                <input type="text" class="form-control" placeholder="your-email@gmail.com" class="email" name="email" value="{{ old('email') }}" autofocus>
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Your Password" name="password">
                            </div>

                            <div class="d-sm-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                                    <input type="checkbox" checked="checked" />
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                            </div>

                            <input type="submit" value="Log In" class="btn btn-block btn-primary">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- <script src="{{ asset('auth/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('auth/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('auth/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('auth/assets/js/main.js') }}"></script> -->
</body>

</html>