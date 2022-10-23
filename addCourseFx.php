<?php 

    // variable declaration
	$coursename = "";
	$instname = "";
	$credits = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	
	$dbconnection = new mysqli("localhost", "root", "","mdsystem") or die ("check your server connection.");

	 if (isset($_POST['add_course'])) {
		 
		$coursename = mysqli_real_escape_string($dbconnection, $_POST['coursename']);
		$instname = mysqli_real_escape_string($dbconnection, $_POST['instname']);
		$credits = mysqli_real_escape_string($dbconnection, $_POST['credits']);
		 
	    // form validation: ensure that the form is correctly filled
		if (empty($coursename)) { array_push($errors, "Course name is required"); }
		if (empty($instname)) { array_push($errors, "Instructor name is required"); }
		if (empty($credits)) { array_push($errors,"Credits is required"); }
		 
		 // add course if there are no errors in the form
		if (count($errors) == 0) {
			
			$query = "INSERT INTO course(name,credit,instructor) VALUES('$coursename','$credits','$instname')";
			mysqli_query($dbconnection, $query);
			
			$_SESSION['success'] = "Course has been added";
			header('location:admin.php');
		}
	 }
	
?>