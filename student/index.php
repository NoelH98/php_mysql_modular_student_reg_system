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
  // $_SESSION['username'];
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.min.css" rel="stylesheet">
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
                    <i class="fa fa-pie-chart mr-3"></i>Student Dashboard
                </a>
            
                <a href="removeUnits.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-table mr-3"></i>Edit Optional Course Units</a>
			
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
                        <th>Your Course</th>
                        <th>Compulsory Units</th>
                        </tr> 
                        </thead>
                      <!-- Table head -->

						<?php 
						 // connect to database
	                    $dbconnection = mysqli_connect('localhost', 'root', '', 'mdsystem');
						$username = $_SESSION['username'];
						
						$query_info = "SELECT year,course FROM students WHERE username='$username'";
						$result_info = mysqli_query($dbconnection,$query_info);
						$row_info = mysqli_fetch_assoc($result_info);
						$year = $row_info['year'];
						$course = $row_info['course'];

						$query = "SELECT DISTINCT unitname FROM units WHERE compulsory='Yes' AND year='$year' AND coursename='$course'";
			            $result = mysqli_query($dbconnection,$query);
						
						
						$query_2 = "SELECT * FROM units WHERE compulsory = 'Yes'";
						$result_2 = mysqli_query($dbconnection,$query_2);
						
						if(mysqli_num_rows($result_2)>0){
								  
						echo"<tbody>";
						while($row = mysqli_fetch_assoc($result)){
							
							echo"<tr>";
							echo"<td>".$course."</td>";
							echo"<td>".$row['unitname']."</td>";
							echo"</tr>";
	
						}
						echo"</tbody>";
						}
						?>
                      
                  <!-- Table body -->
                    
                      
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
						<form method="post" action="addOptionUnitsFx.php">
                            <table class="table table-hover">
                                <!-- Table head -->
                                <thead class="blue lighten-4">
							          <tr>
                                        <th>Your Course</th>
                                        <th>Optional Units</th>
										<th><input type="submit" name="add_units" class="login login-submit" value="Submit"></a></th>
                                    </tr>
                                </thead>
            <!-- Table head -->
	                 <?php 
						 // connect to database
	                    $dbconnection = mysqli_connect('localhost', 'root', '', 'mdsystem');

						$username = $_SESSION['username'];
						
						$query = "SELECT DISTINCT unitname FROM units WHERE compulsory='No' AND year='$year' AND coursename='$course'";
			            $result = mysqli_query($dbconnection,$query);
						
						if(mysqli_num_rows($result_2)>0){
			
								  
						while($row = mysqli_fetch_array($result)){
							
							echo"<tr>";
							echo"<td><input type='checkbox' name='checkbox[]' id='checkbox' value='".$row['unitname']."'>".$course."</input></td>";
							echo"<td>".$row['unitname']."</td>";
							echo"</tr>";
						}
						
						}
					
						?>
                      
                                <!-- Table body -->
                                <tbody>
                                  
                                </tbody>
                                <!-- Table body -->
                            </table>
							</form>
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
                                        <th>Your course</th>
                                        <th>Successfully registered Units</th>
                                    </tr>
                                </thead>
                                <!-- Table head -->
                       <?php 
						 // connect to database
	                    $dbconnection = mysqli_connect('localhost', 'root', '', 'mdsystem');
						
						$username = $_SESSION['username'];

						$query = "SELECT DISTINCT unitname FROM regis WHERE query_status='Yes' AND studentname='$username'";
			            $result = mysqli_query($dbconnection,$query);
						
						if(mysqli_num_rows($result_2)>0){
			           // if(mysqli_num_rows($result)>0){$row_user = mysqli_fetch_assoc($result);}
						
						
						$query_no = "SELECT DISTINCT unitname FROM regis WHERE query_status='No' AND studentname='$username'";
			            $result_no = mysqli_query($dbconnection,$query_no);
						
			  //          if(mysqli_num_rows($result_no)>0){$row_user = mysqli_fetch_assoc($result_no);}
						
								  
						while($row = mysqli_fetch_array($result)){
							
							echo"<tr>";
							echo"<td>".$course."</td>";
							echo"<td>".$row['unitname']."</td>";
							echo"</tr>";
						}
						
						while($row_no = mysqli_fetch_array($result_no)){
							
							echo"<tr>";
							echo"<td><img src='../img/null.png' alt='Pending**' style='width:20px;height:auto;'>".$course."</td>";
							echo"<td>".$row_no['unitname']."</td>";
							echo"</tr>";
						}
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
			     </div>
                <!--Grid column-->
            </div>
	    
	    </div>
    </main>	 
</body>

</html>