

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url('home'); ?>"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

 
    <?php 
  // Display error message if login fails
  if($this->session->flashdata('error')) {
    echo "<p style='color: red;'>".$this->session->flashdata('error')."</p>";
  }
?>

<form action="<?php echo base_url('auth/login'); ?>" method="post">
  <div class="form-group has-feedback">
      
      <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
  </div>
  <div class="form-group has-feedback">
    
      <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
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
      <button type="submit" class="btn btn-primary btn-block btn-flat"">Login</button>
      </div>
    </div>
</form>



   