<?php 
  
    // variable declaration
	$name = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	$dbconnection = new mysqli("localhost", "root", "","mdsystem") or die ("check your server connection.");

	 if (isset($_POST['delete_course'])) {
		 
	    $name = mysqli_real_escape_string($dbconnection, $_POST['name']);
		
	      // form validation: ensure that the form is correctly filled
		if (empty($name)) { array_push($errors, "Course name is required"); }
		 
		 // add course if there are no errors in the form
		if (count($errors) == 0) {
			
			$query_2 = "DELETE FROM course WHERE name='$name'";
			mysqli_query($dbconnection, $query_2);
			
			$_SESSION['success'] = "Course has been removed";
			header('location:admin.php');
		}
	 }
?>