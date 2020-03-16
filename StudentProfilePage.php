<?php

// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: StudentLogin.php");
    exit;
}

   // $users_id = $_SESSION["users_id"];
 //   $company_name = $_SESSION["company_name"];
    
     echo "$users_id";
   // $_SESSION["company_name"] = $company_name;
  //  $_SESSION["company_id"] = $company_id;


// Include config file
 require_once "config.php";



$sql = "SELECT * FROM student where users_id = 44 ";


// data for output

$result = $link->query($sql);

if ($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()) {     
    $student_fname = $row["student_fname"];
    $student_lname = $row["student_lname"];
    $student_email = $row["student_email"];
    $introduction = $row["student_introduction"];
   // $field_id = $row["field_id"];
    $status_id = $row["status_id"];
    $school_id = $row["school_id"];
    $_SESSION["student_id"] = $row["student_id"];
    $_SESSION["student_name"] = $row["student_name"];
    }
  //  echo "$location_id";
    

}

print_r($_SESSION);

if(!empty($field_id)){

$sql2 = "SELECT * FROM field where field_id = $field_id";


$result1 = $link->query($sql2);

if ($result1->num_rows > 0){

  while($row = $result1->fetch_assoc()) {     
  
    $field_id = $row["field_name"];
  
    }

  
    }

}


if(!empty($status_id)){

$sql2 = "SELECT * FROM status where status_id = $status_id";


$result1 = $link->query($sql2);

if ($result1->num_rows > 0){

  while($row = $result1->fetch_assoc()) {     
  
    $status_id = $row["student_status"];
  
    }

  
    }

}




if(!empty($school_id)){

$sql2 = "SELECT * FROM school where school_id = $school_id";


$result1 = $link->query($sql2);

if ($result1->num_rows > 0){

  while($row = $result1->fetch_assoc()) {     
  
    $school_id = $row["school_name"];
  
    }

  
    }

}




$link->close();


?>

 <html class="js sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers" lang="zxx"><head>
	<head>

	
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title> Profile </title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel="manifest" href="site.webmanifest"> -->
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<!-- Place favicon.ico in the root directory -->

	<!-- CSS here -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/gijgo.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/slicknav.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- <link rel="stylesheet" href="css/responsive.css"> -->
	
</head>

<body>
	<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                   
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="index.php">home</a></li>
                                            <li><a href="">View Your Applications</a></li>                                                                            
                                            <li><a href="">Contact</a>	
											<li>
											</li>
                             
                                        </ul>
	
                                    </nav>
                                </div>
                            </div>
							
                                 <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                       
											
											
											
									<nav>
                                        
										 <div class="col-xl-6 col-lg-7">
											<div class="main-menu  d-none d-lg-block">
										
										
										<ul id="navigation">
                                           
                                            <li><a href="StudentLogout.php">Logout <i class="ti-angle-down"></i></a>
                                                
                                            </li>
                                            
                                        
                                        </ul>
											</div>
										</div>
                                    </nav>
											
						<div class="page-header">
        				<h1>Hi, <b><?php echo htmlspecialchars($_SESSION["users_name"]); ?></b>. Welcome to our site.</h1>
        				<h1>Hi, <b><?php echo htmlspecialchars($_SESSION["users_id"]); ?></b>. Welcome to our site.</h1>
    					</div>
											
									 
									   
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
   
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Student Profile</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
	
	<div class="whole-wrap">
		<div class="container box_1170">
			
			<div class="section-top-border">
				<div class="row">
					<div class="col-lg-8 col-md-8">
					<p class="sample-text">Student Name: 
                    <?php  
                     if(!empty($student_fname) && !empty($student_lname))
                    {
                        echo $student_fname;
                        echo " "; 
                        echo $student_lname;
                    }  else
                        {
                            echo " ";
                        }
                    ?> 
                    </p>


                    <br>
                    <p class="sample-text">Email: <br>
                        <?php  
                     if(!empty($student_email))
                    {
                        echo $student_email;
                    }  else
                        {
                            echo " ";
                        }
                    ?>
					<p class="sample-text">Introduction : 
                     <?php  
                     if(!empty($introduction))
                    {
                        echo $introduction;
                    }  else
                        {
                            echo " ";
                        }
                    ?>                
                    </p><br>
					<p class="sample-text">School: 
                      <?php  
                     if(!empty($school_id))
                    {
                        echo $school_id;
                    }  else
                        {
                            echo " ";
                        }
                    ?>

					</p>
					<br>

					<p class="sample-text">Student Status : 
                     <?php  
                     if(!empty($status_id))
                    {
                        echo $status_id;
                    }  else
                        {
                            echo " ";
                        }
                    ?>                
                    </p><br>			
				</div>
						
					</div><br><br>
					
				
				<a href="#" class="genric-btn success circle">Edit</a> 
				
			</div>
						</form>
					</div>
			</div>
		</div>
	</div>

 
  

	<!-- JS here -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
	<script src="js/vendor/jquery-1.12.4.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/ajax-form.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/jquery.counterup.min.js"></script>
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<script src="js/scrollIt.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/nice-select.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/gijgo.min.js"></script>

	<!--contact js-->
	<script src="js/contact.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.form.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/mail-script.js"></script>

	<script src="js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
    </script>

</div></body></html>

