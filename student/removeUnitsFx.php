<?php 
  
	 // variable declaration
	$name = "";
	$studentname = "";
    $errors = array(); 
	$_SESSION['success'] = "";
	
	
	$dbconnection = new mysqli("localhost", "root", "","mdsystem") or die ("check your server connection.");

    if (isset($_POST['delete_unit'])) {
		 
	    $name = mysqli_real_escape_string($dbconnection, $_POST['name']);
		$studentname = mysqli_real_escape_string($dbconnection, $_POST['studentname']);
		
	      // form validation: ensure that the form is correctly filled
		if (empty($name)) { array_push($errors, "Unit name is required"); }
		if (empty($studentname)) { array_push($errors, "Username is required"); }
		 
		 // add course if there are no errors in the form
		if (count($errors) == 0) {
			
			$username = $_SESSION['username'];
			$query_2 = "DELETE FROM regis WHERE unitname='$name' AND studentname='$studentname' AND query_status='Yes'";
			mysqli_query($dbconnection, $query_2);
			
			$_SESSION['success'] = "Unit has been removed";
			header('location:index.php');
		}
	 }
?>