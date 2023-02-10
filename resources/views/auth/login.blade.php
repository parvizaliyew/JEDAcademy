<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from demo.dashboardpack.com/marketing-html/index_3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Aug 2022 06:20:48 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>LOGIN</title>
    <link rel="icon" href="{{ asset('manager/img/logo.png') }}" type="image/png" />

    <link rel="stylesheet" href="{{ asset('manager/css/bootstrap1.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('manager/css/style1.css') }}" />
    <style>

    </style>
    @stack('css')
</head>

<body class="crm_body_bg">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Giriş</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.login_post') }}">
                            @csrf
                            <div class="form-group my-4">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control">
                                @error('email')
                                    <b class="text-danger my-4 ">{{ $message }}</b>
                                @enderror
                            </div>

                            <div class="form-group my-4">
                                <label for="password">Şifrə</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <b class="text-danger my-4 ">{{ $message }}</b>
                                @enderror
                            </div>

                            <div class="form-group my-4">
                                <button type="submit" class="btn btn-primary w-100">Giriş Et</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>