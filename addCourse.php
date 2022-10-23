<?php include('addCourseFx.php'); ?>
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
	
	?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Add Course</title>

  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

    <link rel="stylesheet" href="csss/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
    <h1>Add Course</h1><br>
  <form  method="post" action="addCourseFx.php">
      <?php include('errors.php'); ?>
    <input type="text" name="coursename" placeholder="Course name" value="<?php echo $coursename; ?>">
    <input type="text" name="instname" placeholder="Course instructor" value="<?php echo $instname; ?>">
	 <span class="label-input100">Credits</span>
     <select size="1" name="credits" value="<?php echo $credits; ?>" >
	 <option>--Please Select--</option>
     <option>1</option>
     <option>2</option>
	 <option>3</option>
	 <option>4</option>
     <option>5</option>
	 <option>6</option>
	 <option>7</option>
	 </select>
    <input type="submit" name="add_course" class="login login-submit" value="add course">
  </form>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

</body>

</html>