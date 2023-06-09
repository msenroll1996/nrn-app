
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NRNA Admin | Reset Password Form</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
{{--    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">--}}
{!! Html::style('admin/plugins/fontawesome-free/css/all.min.css') !!}
    <!-- icheck bootstrap -->
{{--    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">--}}
{!! Html::style('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}
    <!-- Theme style -->
{{--    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">--}}
    {!! Html::style('admin/dist/css/adminlte.min.css') !!}
    {!! Html::style('admin/css/custom-admin.css') !!}

    <link rel="stylesheet" href="">

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="" class="h1">
                <img class="extratech-logo img-fluid" src="{{url(\App\Models\Setting::where('slug','logo')->first()->value ?? '')}}" alt="Insert Logo from Settings">
            </a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Password reset form</p>

            @include('errors.error')
            @include('success.success')
            <form action="{{url('reset-password')}}" style = "align:center" method="post">
                            @csrf
                            <div class="ps-form--review" >
                                <h2 class="ps-form__title">Reset Password</h2>
                                <div class="flash-message">
                                @include('success.success')
                               @include('errors.error')
                                        </div>
                                <div class="ps-form__group" >
                                    <label class="ps-form__label">New password *</label>
                                    <input class="form-control ps-form__input" type="password" name = 'password' required>
                                </div>
                                <div class="ps-form__group" >
                                    <label class="ps-form__label">Confirm New password *</label>
                                    <input class="form-control ps-form__input" type="password" name = 'password_confirmation' required>
                                </div>
                                <input type = "hidden" name = "token" value = "{{$token}}">
                                <input type = "hidden" name = "email" value = "{{$email}}">
                                
                                <div class="ps-form__submit">
                                    <button class="ps-btn ps-btn--lblue btn btn-create btn-block">Submit</button>
                                </div>
                            </div>
                    </form>


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
{{--<script src="../../plugins/jquery/jquery.min.js"></script>--}}
{!! Html::script('admin/plugins/jquery/jquery.min.js') !!}
<!-- Bootstrap 4 -->
{{--<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
{!! Html::script('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}
<!-- AdminLTE App -->
{{--<script src="../../dist/js/adminlte.min.js"></script>--}}
{!! Html::script('admin/dist/js/adminlte.js') !!}
</body>
</html>
