<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        @include('layouts.styles')
        @stack('styles')
        <title>Login</title>
    </head>

    <body class="bg-gradient-primary" style="background: url(&quot;assets/img/fondo_login.png&quot;) center / cover;">
        <section>
            <div class="lgp-hd">
                <h2><strong>Bienvenido a RR.HH.&nbsp;</strong></h2>
                <h5><strong>logueese para acceder al home</strong></h5>
            </div>
            <div class="container login-cont">
                <div class="row">
                    <div class="col-10 col-sm-6 col-md-4 col-lg-4 offset-1 offset-sm-3 offset-md-4 offset-lg-4 login-col" data-aos="flip-left" data-aos-duration="950" data-aos-once="true"><i class="icon ion-lock-combination"></i>
                        <form class="login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="email" id="formum" style="color: rgb(255,255,255);" placeholder="Email"
                                       name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" id="formum2" style="color: rgb(255,255,255);" placeholder="Password" name="password" value="{{ old('password') }}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-light btn-lg login-btn" type="submit"><strong>Login</strong>
                                </button>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="small" href="{{ route('password.request') }}" style="color: rgb(9,205,232);">Olvidaste tu contraseña?</a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.scripts')
        @stack('scripts')
    </body>
</html>
