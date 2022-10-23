<?php include('server.php')?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Admin registration</title>

  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

    <link rel="stylesheet" href="csss/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
  <h1>Register</h1><br>
  <form method="post" action="reg.php">
   <?php include('errors.php')?>
  	<input type="text" name="username" placeholder="Username">
    <input type="password" name="password_1" placeholder="Password">
	<input type="password" name="password_2" placeholder="Confirm Password">
    <input type="submit" name="reg_user" class="login login-submit" value="register">
  </form>
   <div class="login-help">
    <a href="login.php">Login</a> • <a href="#">Forgot Password</a>
  </div>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

</body>

</html>