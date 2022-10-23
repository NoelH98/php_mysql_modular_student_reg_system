<?php include('addUnitsFx.php'); ?>
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

  <title>Add Unit</title>

  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

    <link rel="stylesheet" href="../csss/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
  <h1>Add Unit</h1><br>
  <form method="post" action="">
  
  <input type="text" name="studentname" placeholder="Username">
  
   <?php include('errors.php'); ?>
   <?php    
            $username = $_SESSION['username'];
			$query_info = mysqli_query($dbconnection,"SELECT course,year FROM students WHERE username='$username'");
			$row_info = mysqli_fetch_assoc($query_info);
			
			$course = $row_info['course'];
			$year = $row_info['year'];
			
		    $sql = "SELECT unitname FROM units WHERE coursename='$course' AND year='$year' AND compulsory='Yes'";
		    $result = $dbconnection->query($sql);
		    
    ?> 
    <span class="label-input100">Unit name</span>
	<select class ="required-entry" name="acname" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">	
	  <option value="">--Please Select--</option>
	  <?php if ($result->num_rows > 0) { ?>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <option value="<?php echo $row['unitname']?>"><?php echo $row['unitname']; ?></option>
      <?php } ?>		
      <?php } ?>
    </select>
    <input type="submit" name="add_units" class="login login-submit">
  </form>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

</body>

</html>