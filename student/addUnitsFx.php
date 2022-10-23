<?php 

    // variable declaration
	$acname = "";
	$studentname = "";
	
	$errors = array(); 
	$_SESSION['success'] = "";

	$dbconnection = new mysqli("localhost", "root", "","mdsystem") or die ("check your server connection.");
	
	 if (isset($_POST['add_units'])) {
	
	    $acname = mysqli_real_escape_string($dbconnection, $_POST['acname']);
		$studentname = mysqli_real_escape_string($dbconnection, $_POST['studentname']);
		// form validation: ensure that the form is correctly filled
		if (empty($acname)) { array_push($errors, "Unit name is required"); }
		if (empty($studentname)) { array_push($errors, "Username is required"); }
		// add course if there are no errors in the form
		if (count($errors) == 0) {
			
			$query_info_2 = mysqli_query($dbconnection,"SELECT course FROM students WHERE username='$studentname'");
			$row_info_2 = mysqli_fetch_assoc($query_info_2);
			
			$course_2 = $row_info_2['course'];
			
			$query_2 = "INSERT INTO regis(studentname,unitname,coursename,query_status) VALUES('$studentname','$acname','$course_2','Yes')";
			mysqli_query($dbconnection, $query_2);
			
			$_SESSION['success'] = "Unit has been added";
			header('location:index.php');
		}
	 }

?>