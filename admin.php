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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Module System</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
</head>
<body class="grey lighten-3">
 <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">
                    <strong class="blue-text">MS</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        
                    </ul>

                   
                </div>

            </div>
        </nav>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed">

            <a class="logo-wrapper waves-effect">
                <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="">
            </a>

            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item active waves-effect">
                    <i class="fa fa-pie-chart mr-3"></i>Admin Dashboard
                </a>
                <a href="addCourse.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-user mr-3"></i>Add Courses</a>
                <a href="addUnits.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-table mr-3"></i>Add Course Units</a>
                <a href="RemoveCourse.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-map mr-3"></i>Remove Course</a>
                <a href="RemoveUnits.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-logout mr-3"></i>Remove Course Units</a>
					
			    <a href="logout.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-logout mr-3"></i>Logout</a>
            </div>

        </div>
        <!-- Sidebar -->
    </header>
	 <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
    
		<div class="row wow fadeIn">

	 <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

	    <!-- Table  -->
             <table class="table table-hover">
                <!-- Table head -->
                    <thead class="blue-grey lighten-4">
                        <tr> 
                        <th>Instructor</th>
                        <th>Registered Course</th>
					 	</tr> 
                        </thead>
						<!-- Table head -->

						<?php 
						 // connect to database
	                    $dbconnection = mysqli_connect('localhost', 'root', '', 'mdsystem');

						$query = "SELECT DISTINCT name,instructor FROM course";
			            $result = mysqli_query($dbconnection,$query);
			      //      if(mysqli_num_rows($result)>0){$row_user = mysqli_fetch_assoc($result);}
								  
						while($row = mysqli_fetch_array($result)){
							echo"<tr>";
							echo"<th>".$row['instructor']."</th>";
							echo"<th>".$row['name']."</th>";
							echo"</tr>";
						}
						?>
                      
                  <!-- Table body -->
                    
                                <!-- Table body -->
                            </table>
                            <!-- Table  -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Table  -->
                            <table class="table table-hover">
                                <!-- Table head -->
                                <thead class="blue lighten-4">
                                    <tr>
                                        <th>Registered Unit Name</th>
                                        <th>Associated Course</th>
                                    </tr>
                                </thead>
                                <!-- Table head -->
	                        <?php 
						       
						         $query_2 = "SELECT DISTINCT unitname,coursename FROM units";
			                     $result_2 = mysqli_query($dbconnection,$query_2);
			                 //    if(mysqli_num_rows($result_2)>0){$row_user_2 = mysqli_fetch_assoc($result_2);}
								  
						         while($row_2 = mysqli_fetch_array($result_2)){
							
							     echo"<tr>";
							     echo"<td>".$row_2['unitname']."</td>";
							     echo"<td>".$row_2['coursename']."</td>";
							     echo"</tr>";
						         }
						         ?>
                                <!-- Table body -->
                                <tbody>
                                  
                                </tbody>
                                <!-- Table body -->
                            </table>
                            <!-- Table  -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->
  <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Table  -->
                            <table class="table table-hover">
                                <!-- Table head -->
                                <thead class="blue lighten-4">
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Course</th>
										<th>Optional Unit Pending Approval</th>
										<th><a href="update.php">Approve?</a></th>
                                    </tr>
                                </thead>
                                <!-- Table head -->
	                        <?php 
						       
						         $query_2 = "SELECT DISTINCT studentname,unitname,coursename FROM regis WHERE query_status ='No'";
			                     $result_2 = mysqli_query($dbconnection,$query_2);
			            //         if(mysqli_num_rows($result_2)>0){$row_user_2 = mysqli_fetch_assoc($result_2);}
								  
						         while($row_2 = mysqli_fetch_array($result_2)){
							
							     echo"<tr>";
								 echo"<td>".$row_2['studentname']."</td>";
							     echo"<td>".$row_2['coursename']."</td>";
							     echo"<td>".$row_2['unitname']."</td>";
							     echo"</tr>";
						         }
						         ?>
                                <!-- Table body -->
                                <tbody>
                                  
                                </tbody>
                                <!-- Table body -->
                            </table>
                            <!-- Table  -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->
            </div>
	     </div>
		 
	    </div>
    </main>	 
</body>

</html>