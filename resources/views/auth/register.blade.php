<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>BazzarX | Register</title>
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="mb-3 text-center">
                            <x-logo />
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">
                                    <div class="mt-2 col-6">
                                        <label for="frist_name">First Name</label>
                                        <input id="frist_name" type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" autofocus>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <div class="mt-2 col-6">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ old('email') }}">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="mt-2 col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control pwstrength"
                                                data-indicator="pwindicator" name="password"><x-input-error
                                                :messages="$errors->get('password')" class="mt-2" />

                                        </div>
                                        <div class="mt-2 col-6">
                                            <label for="password2" class="d-block">Password Confirmation</label>
                                            <input id="password2" type="password" class="form-control"
                                                name="password_confirmation">
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-4 text-center text-muted">
                                Already Registered? <a href="{{ route('login') }}">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="assets/js/page/auth-register.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>
