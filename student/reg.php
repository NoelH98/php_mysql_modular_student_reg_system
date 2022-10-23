<?php include('server.php')?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Student registration</title>

  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

  <link rel="stylesheet" href="../csss/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
    <h1>Register</h1><br>
  <form method="post" action="reg.php">
   <?php include('errors.php')?>
   <?php
            $dbconnection = new mysqli("localhost", "root", "","mdsystem") or die ("check your server connection.");
		    $sql = "SELECT id,name FROM course";
		    $result = $dbconnection->query($sql);
		    
    ?> 

  	<input type="text" name="name" placeholder="username">
    <input type="password" name="password_1" placeholder="Password">
	<input type="password" name="password_2" placeholder="Confirm Password">
	
	
	<span class="label-input100">Available Courses</span>
	<select class ="required-entry" name="acname" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">	
	  <option value="">--Please Select--</option>
	  <?php if ($result->num_rows > 0) { ?>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <option value="<?php echo $row['name']?>"><?php echo $row['name']; ?></option>
      <?php } ?>		
      <?php } ?>
    </select>
	
	<span class="label-input100">Year</span>
     <select size="1" name="year">
	 <option>--Please Select--</option>
     <option>1</option>
     <option>2</option>
	 <option>3</option>
	 <option>4</option>
	 <option>5</option>
	 <option>6</option>
	 </select>
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