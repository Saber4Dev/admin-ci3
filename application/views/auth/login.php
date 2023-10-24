<body class="hold-transition login-page" id="gradient">

    <div class="login-box"  >
        
        <!-- /.login-logo -->
        <div class="login-box-body">
        <div class="login-logo">
            <img class="img-responsive center-image" src="<?php echo base_url('assets/admin_lte_assets/dist/img/logo.png'); ?>" alt="Logo" style="width:250px;">
        </div>
           
            <p class="login-box-msg">Sign in to start your session</p>

            <?php
            // Display error message if login fails
            if ($this->session->flashdata('error')) {
                echo "<p style='color: red;'>" . $this->session->flashdata('error') . "</p>";
            }
            ?>

            <form action="<?php echo base_url('auth/login'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="identity" id="identity" class="form-control"
                        placeholder="Enter your email or username" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password"
                        required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                </div>
            </form>