<?php include('removeUnitsFx.php'); ?>
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

  <title>Remove Unit</title>

  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

  <link rel="stylesheet" href="../csss/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
    <h1>Remove Unit</h1><br>
  <form method="post" action="">
   <?php include('errors.php'); ?>
	 <?php
	        $username = $_SESSION['username'];
		    $sql_2 = "SELECT course,year FROM students WHERE username='$username'";
			$results_2 = mysqli_query($dbconnection,$sql_2);
			
			$row = mysqli_fetch_array($results_2);
			
			$course = $row['course'];
			$year = $row['year'];
		    
			$sql = "SELECT unitname FROM units WHERE compulsory='No' AND coursename='$course' AND year='$year'";
		    $result = $dbconnection->query($sql);	
			
    ?> 
     <input type="text" name="studentname" placeholder="Username">
  
	 <span class="label-input100">Unit name</span>
	  <select class ="required-entry" name="name" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">	
	  <option value="">--Please Select--</option>
	  <?php if ($result->num_rows > 0) { ?>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <option value="<?php echo $row['unitname']?>"><?php echo $row['unitname']; ?></option>
      <?php } ?>		
      <?php } ?>
    <input type="submit" name="delete_unit" class="login login-submit" value="remove unit">
  </form>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

</body>

</html>