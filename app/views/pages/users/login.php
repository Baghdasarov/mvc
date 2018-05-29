<?php require( APPROOT . '/views/layout/header.view.php'); ?>
    <div class="container login-form">
        <form class="form-horizontal col-md-offset-3" role="form" method="POST">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 text-center">
                    <h2>Please Login</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="email">E-Mail Address</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="text" name="email" class="form-control" id="email"
                                   placeholder="you@example.com" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <?php
                                if(isset($data['email'])) {
                                    echo $data['email'];
                                }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="password">Password</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon"><i class="fa fa-key"></i></div>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Password" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <?php
                                if(isset($data['password'])) {
                                    echo $data['password'];
                                }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        <?php
                            if(isset($data['user'])) {
                                echo $data['user'];
                            }
                        ?>
                    </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-sign-in"></i> Login</button>
                </div>
            </div>
        </form>
    </div>
<?php require( APPROOT . '/views/layout/footer.view.php');  ?>