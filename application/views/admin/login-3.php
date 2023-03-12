<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('admin/login'); ?>
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo set_value('username'); ?>">

        <label for="password">Password</label>
        <input type="password" name="password" value="<?php echo set_value('password'); ?>">

        <input type="submit" value="Login">
    </form>
</body>
</html>
