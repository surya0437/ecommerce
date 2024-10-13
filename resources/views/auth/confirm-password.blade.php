<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>BazzarX | Confirm Password</title>
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

                            <div class="card-body">
                                <label class="control-label">Please confirm your password.</label>
                                <form method="POST" action="{{ route('password.confirm') }}">
                                    @csrf

                                    <div class="mt-2">
                                        <label for="password" class="control-label">Password</label>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Confirm
                                        </button>
                                    </div>
                                </form>

                            </div>
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
