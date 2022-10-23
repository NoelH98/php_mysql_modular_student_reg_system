<?php include('server.php')?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Student Login</title>

  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

    <link rel="stylesheet" href="../csss/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
    <h1>Login</h1><br>
  <form method="post" action="login.php">
     <?php include('errors.php')?>
  	<input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login_user" class="login login-submit" value="Login">
  </form>
  <div class="login-help">
    <a href="reg.php">Register</a> • <a href="#">Forgot Password</a>
  </div>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

</body>

</html>