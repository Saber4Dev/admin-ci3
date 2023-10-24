<body class="hold-transition register-page" id="gradient">
    <div class="register-box">

        <div class="register-box-body">
        <div class="login-logo">
            <img class="img-responsive center-image" src="<?php echo base_url('assets/admin_lte_assets/dist/img/logo.png'); ?>" alt="Logo" style="width:250px;">
        </div>
            <p class="login-box-msg">Register a new membership</p>


            <form action="<?php echo base_url('auth/register'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="name" placeholder="Full name" value="<?php echo set_value('name'); ?>">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <?php echo form_error('name', '<p class="text-danger">', '</p>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <?php echo form_error('username', '<p class="text-danger">', '</p>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?php echo form_error('password2', '<p class="text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="agree" value="1" <?php echo set_checkbox('agree', '1'); ?>> I agree to the <a href="#">terms</a>
                                </label>
                                <?php echo form_error('agree', '<p class="text-danger">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-primary btn-block btn-flat" disabled="disabled" id="registerBtn">Register</button>
                        </div>
                    </div>
                </div>
            </form>

            <script>
                // Disable the Register button until the "I agree to the terms" checkbox is checked
                const agreeCheckbox = document.querySelector('input[name="agree"]');
                const registerBtn = document.getElementById('registerBtn');
                
                agreeCheckbox.addEventListener('change', function () {
                    if (this.checked) {
                        registerBtn.removeAttribute('disabled');
                    } else {
                        registerBtn.setAttribute('disabled', 'disabled');
                    }
                });
            </script>
