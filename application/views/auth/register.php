
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?php echo base_url('home'); ?>"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>


<form action="<?php echo base_url('admin/register'); ?>" method="post">
    <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" placeholder="Full name" value="<?php echo set_value('name'); ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php echo form_error('name', '<p class="text-danger">', '</p>'); ?>
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
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                    <input type="checkbox" name="agree"> I agree to the <a href="#">terms</a>
                </label>
            </div>
            <?php echo form_error('agree', '<p class="text-danger">', '</p>'); ?>
        </div>
        
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
       
    </div>
</form>


