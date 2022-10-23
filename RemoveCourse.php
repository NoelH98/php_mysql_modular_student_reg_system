<?php include('RemoveCourseFx.php'); ?>
<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
	$dbconnection = new mysqli("localhost", "root", "","mdsystem") or die ("check your server connection.");

	?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Remove Course</title>

  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

    <link rel="stylesheet" href="csss/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
    <h1>Remove Course</h1><br>
    <form method="post" action="">
     <?php include('errors.php'); ?>
	 <?php
		    $sql = "SELECT id,name FROM course";
		    $result = $dbconnection->query($sql);
		    
    ?> 
	<span class="label-input100">Course name</span>
	<select class ="required-entry" name="name" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">	
	  <option value="">--Please Select--</option>
	  <?php if ($result->num_rows > 0) { ?>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <option value="<?php echo $row['name']?>"><?php echo $row['name']; ?></option>
      <?php } ?>		
      <?php } ?>
    </select>
    <input type="submit" name="delete_course" class="login login-submit" value="remove course">
  </form>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

</body>

</html>