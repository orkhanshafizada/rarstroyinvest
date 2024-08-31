<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | {{ setting('title') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{ get_file_url('admin/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ get_file_url('admin/assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ get_file_url('admin/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ get_file_url('admin/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ get_file_url('admin/assets/js/app.js') }}"></script>
    <style>
        .icon-login {
            top: 26px !important;
        }
    </style>
</head>
<body>
<div class="page-content login-cover">
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="content d-flex justify-content-center align-items-center">
                <form class="login-form" action="{{route('admin.postLogin')}}" method="post">
                    @csrf
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-reading icon-2x text-secondary border-secondary border-3 rounded-pill p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">{{ __('Login your account') }}</h5>
                            </div>
                            @if(\Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ \Session::get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endif
                            {{ \Session::forget('success') }}
                            @if(\Session::get('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ \Session::get('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <label for="username">{{ __('Username') }}</label>
                                <input type="text" name="email" class="form-control" placeholder="{{ __('Username') }}">
                                <div class="form-control-feedback icon-login">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>
                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <label for="pass">{{ __('Password') }}</label>
                                <input type="password" name="password" class="form-control" placeholder="{{ __('Password') }}">
                                <div class="form-control-feedback icon-login">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Sign in') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
