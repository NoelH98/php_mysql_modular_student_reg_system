<?php 
  
    session_start();
    // variable declaration
	$answer = "";
	$student = "";
	
	$username = $_SESSION['username'];

	$errors = array(); 
	$_SESSION['success'] = "";

	$dbconnection = new mysqli("localhost", "root", "","mdsystem") or die ("check your server connection.");

	
	 if (isset($_POST['update_query'])) {
		 
	  $answer = mysqli_real_escape_string($dbconnection, $_POST['answer']);
	  $student = mysqli_real_escape_string($dbconnection, $_POST['student']);
	  
	   // form validation: ensure that the form is correctly filled
	  if (empty($answer)) { array_push($errors, "Answer is required"); }
	  if (empty($student)) { array_push($errors, "Student is required"); }
	  
	  
	  // add course if there are no errors in the form
	  if (count($errors) == 0) {
		
	    $query_2 = "UPDATE regis SET query_status='$answer' WHERE query_status='No' AND studentname='$student' ORDER BY id LIMIT 1";
		mysqli_query($dbconnection, $query_2);
			
		$_SESSION['success'] = "Updated";
		header('location:admin.php');
	  }
	  
	 }
?>