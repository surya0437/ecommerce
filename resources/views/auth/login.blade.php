<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>BazzarX | Login</title>
    <link rel="stylesheet" href="/assets/css/app.min.css">
    <link rel="stylesheet" href="/assets/bundles/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='/assets/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="mb-3 text-center">
                            <x-logo />
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mt-2">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="1" autofocus value="{{ old('email') }}">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                    </div>
                                    <div class="mt-2">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="text-small">
                                                    Forgot Password?
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                                <div class="mt-4 mb-3 text-center">
                                    <div class="text-job text-muted">Login With Social</div>
                                </div>
                                <div class="row sm-gutters">
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-facebook">
                                            <span class="fab fa-facebook"></span> Facebook
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-twitter">
                                            <span class="fab fa-twitter"></span> Twitter
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 text-center text-muted">
                            Don't have an account? <a href="{{ route('register') }}">Create One</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="/assets/js/app.min.js"></script>
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>
</body>

</html>
