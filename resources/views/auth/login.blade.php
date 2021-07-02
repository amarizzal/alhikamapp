<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Al-Hikam App</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
            name="viewport"
        />

        <!-- Bootstrap 3.3.7 -->
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        />

        <!-- Font Awesome -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />

        <link
            href="https://fonts.googleapis.com/css?family=Montserrat&display=swap"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css"
        />

        <style type="text/css">
            body {
                font-family: "Montserrat", sans-serif;
                font-style: normal;
                margin: 0;
                padding: 0;
                background-image: url("https://res.cloudinary.com/dbrgl4f37/image/upload/v1577624425/uran_rebound_-_dribbble_shot_copy.png");
                background-size: 60%;
                background-position: absolute;
                background-repeat: no-repeat;
                /* background-attachment: ; */
            }
            .title_login {
                padding: 5px;
            }
            .title_login h1 {
                font-weight: bold;
                font-size: 36px;
                line-height: 59px;
                text-align: center;
            }
            .title_login img {
                display: block;
                margin: 0 auto;
                width: 200px;
            }
            .login-box {
                /*border: 1px solid #d2d6de;*/
                margin: 0% auto;
                border: 1px solid;
                padding: 10px;
                box-shadow: 5px 10px #888888;
            }

            .btn-primary {
                background-color: #63a4e8;
            }

            @media only screen and (max-width: 414px) {
                body {
                    background-size: 100%;
                }

                .title_login h1 {
                    font-size: 20px;
                    line-height: 25px;
                }
                .login {
                    margin-top: 50%;
                }
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row" style="margin-top: 6%">
                <div class="col-md-6 col-xs-12"></div>
                <div class="col-md-6 col-xs-12 login">
                    <div class="title_login">
                            <img src="assets/logo-ospam.png" alt="">
                    </div>
                    <div class="login-box">
                        <div class="login-box-body">

                            @if($errors->any()) @foreach ($errors->all() as
                            $error)
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $error }}</strong>
                            </div>
                            @endforeach @endif

                            <form
                                method="post"
                                action="{{ route('admin.login') }}"
                            >
                                {!! csrf_field() !!}

                                <div
                                    class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}"
                                >
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="username"
                                        value="{{ old('username') }}"
                                        placeholder="Username"
                                    />
                                    <span
                                        class="glyphicon glyphicon-user form-control-feedback"
                                    ></span>
                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong
                                            >{{ $errors->first('username') }}</strong
                                        >
                                    </span>
                                    @endif
                                </div>

                                <div
                                    class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}"
                                >
                                    <input
                                        type="password"
                                        class="form-control"
                                        placeholder="Password"
                                        name="password"
                                    />
                                    <span
                                        class="glyphicon glyphicon-lock form-control-feedback"
                                    ></span>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong
                                            >{{ $errors->first('password') }}</strong
                                        >
                                    </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-xs-12">
                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-block btn-flat"
                                        >
                                            Sign In
                                        </button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                        <!-- /.login-box-body -->
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
