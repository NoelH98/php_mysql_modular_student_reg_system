<?php 
  
    // variable declaration
	$acname = "";
	$unitname = "";
	$comp = "";
	$unityear = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	$dbconnection = new mysqli("localhost", "root", "","mdsystem") or die ("check your server connection.");

	 if (isset($_POST['add_units'])) {
		 
	    $acname = mysqli_real_escape_string($dbconnection, $_POST['acname']);
		$unitname = mysqli_real_escape_string($dbconnection, $_POST['unitname']);
		$comp = mysqli_real_escape_string($dbconnection, $_POST['comp']);
		$unityear = mysqli_real_escape_string($dbconnection, $_POST['unityear']);
	
	      // form validation: ensure that the form is correctly filled
		if (empty($acname)) { array_push($errors, "Associated Course name is required"); }
		if (empty($unitname)) { array_push($errors, "unit name is required"); }
		if (empty($comp)) { array_push($errors,"Is it compulsory?"); }
		if (empty($unityear)) { array_push($errors,"Unit year is required"); }
		 
		 // add course if there are no errors in the form
		if (count($errors) == 0) {
			
			$query_2 = "INSERT INTO units(compulsory,unitname,coursename,year) VALUES('$comp','$unitname','$acname','$unityear')";
			mysqli_query($dbconnection, $query_2);
			
			$_SESSION['success'] = "Unit has been added";
			header('location:admin.php');
		}
	 }
?>