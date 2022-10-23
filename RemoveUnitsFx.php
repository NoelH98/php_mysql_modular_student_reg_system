<?php 
  
    // variable declaration
	$name = "";
	$unitname ="";
	$errors = array(); 
	$_SESSION['success'] = "";

	$dbconnection = new mysqli("localhost", "root", "","mdsystem") or die ("check your server connection.");

	 if (isset($_POST['delete_unit'])) {
		 
	    $name = mysqli_real_escape_string($dbconnection, $_POST['name']);
		$unitname = mysqli_real_escape_string($dbconnection, $_POST['unitname']);
		
	      // form validation: ensure that the form is correctly filled
		if (empty($name)) { array_push($errors, "Course name is required"); }
		if (empty($unitname)) { array_push($errors, "Unit name is required");}
		 
		 // add course if there are no errors in the form
		if (count($errors) == 0) {
			
			$query_2 = "DELETE FROM units WHERE unitname='$unitname' AND coursename='$name'";
			mysqli_query($dbconnection, $query_2);
			
			$_SESSION['success'] = "Unit has been removed";
			header('location:admin.php');
		}
	 }
?>