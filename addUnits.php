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

  <link rel="stylesheet" href="csss/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
  <h1>Add Unit</h1><br>
  <form method="post" action="">
   <?php include('errors.php'); ?>
   <?php
		    $sql = "SELECT id,name FROM course";
		    $result = $dbconnection->query($sql);
		    
    ?> 

	<span class="label-input100">Associated Course name</span>
	<select class ="required-entry" name="acname" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">	
	  <option value="">--Please Select--</option>
	  <?php if ($result->num_rows > 0) { ?>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <option value="<?php echo $row['name']?>"><?php echo $row['name']; ?></option>
      <?php } ?>		
      <?php } ?>
    </select>
	
	<input type="text" name="unitname" placeholder="Unit name" value="<?php echo $unitname; ?>">
	
    <span class="label-input100">is it Compulsory?</span>
     <select size="1" name="comp" value="<?php echo $comp; ?>">
	 <option>--Please Select--</option>
     <option>Yes</option>
     <option>No</option>
	 </select>
	 
	 <span class="label-input100">Unit Year</span>
     <select size="1" name="unityear" value="<?php echo $unityear; ?>">
	 <option>--Please Select--</option>
     <option>1</option>
     <option>2</option>
	 <option>3</option>
	 <option>4</option>
	 <option>5</option>
	 <option>6</option>
	 </select>
    <input type="submit" name="add_units" class="login login-submit" value="add unit">
  </form>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

</body>

</html>