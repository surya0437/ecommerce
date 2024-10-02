<x-app-layout>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Modal With Form</h4>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Modal
                        With Form</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

        <!-- Modal with form -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModal">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="">
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                            </div>
                            <div class="mb-0 form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input"
                                        id="remember-me">
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary m-t-15 waves-effect">LOGIN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


