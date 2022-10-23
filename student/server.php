<?php 
	session_start();

	// variable declaration
	$username = "";
	$course = "";
	$year = "";
	
	$errors = array(); 
	$_SESSION['success'] = "";
    
	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'mdsystem');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
	
	    // receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['name']);
		$course = mysqli_real_escape_string($db,$_POST['acname']);
		$year = mysqli_real_escape_string($db,$_POST['year']);
		
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($course)) { array_push($errors, "Course is required"); }
		if (empty($year)) { array_push($errors, "Year is required"); }
		
		$sql = "SELECT * FROM students WHERE username='$username'";
		$res_u = mysqli_query($db,$sql);
		
		if(mysqli_num_rows($res_u)>0){
			array_push($errors, "Sorry...Username already taken");
		}
		
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		
		 // register user if there are no errors in the form
		if (count($errors) == 0) {
			
			$query_units = mysqli_query($db,"SELECT unitname FROM units WHERE compulsory='Yes' AND coursename='$course' AND year='$year'");
		//	$row_units = mysqli_fetch_assoc($query_units);
			
			while($row = mysqli_fetch_assoc($query_units)) { 
	
		    $unitxx = $row['unitname'];
			
			$query_2 = "INSERT INTO regis(studentname,unitname,coursename,query_status) VALUES('$username','$unitxx','$course','Yes')";
			mysqli_query($db, $query_2);
			
			}
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO students (username,password,course,year)VALUES('$username','$password','$course','$year')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location:index.php');
		}
	}
	
	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM students WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query) or die('Invalid query:'.mysql_error($db));

			if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location:index.php');
			}else {
			array_push($errors, "Wrong username/password combination");
			}
		}
	}
	mysqli_close($db);
?>