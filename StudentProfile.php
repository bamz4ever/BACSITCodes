<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Studentlogin.php");
    exit;
}




    
    if(isset($_POST['submit'])){
    
$first = mysqli_real_escape_string($conn, $_POST['student_first_name']);
$last= mysqli_real_escape_string($conn, $_POST['student_last_name']);
$intro= mysqli_real_escape_string($conn, $_POST['introduction']);
    
    
    $sql ="INSERT INTO student (student_fname, student_lname, student_introduction)
    VALUES(?, ?, ?) "; 
    
    $stmt = mysqli_stmt_init($conn);
    //Prepare the prepared satatement
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo"SQL statement failed";
    } else{
        
        mysqli_stmt_bind_param($stmt, "sss", $first, $last, $intro); 
        
        //Run Parameters inside database
        mysqli_stmt_execute($stmt);
    }
    
}





?>

<?php

$mysqli = NEW mysqli('localhost', 'root','password', 'jobapp');


?>


<html class="js sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers" lang="zxx"><head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Student Profile </title>
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
                                    <a href="jobslisting.php">
                                        <img src="img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="index.php">home</a></li>
                                            <li><a href="jobslisting.php">Browse Job</a></li>
                                            
                                            
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="studentLogout.php">Log out</a>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"><div class="slicknav_menu"><a href="#" aria-haspopup="true" role="button" tabindex="0" class="slicknav_btn slicknav_collapsed" style=""><span class="slicknav_menutxt">MENU</span><span class="slicknav_icon"><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span></span></a><ul class="slicknav_nav slicknav_hidden" aria-hidden="true" role="menu" style="display: none;">
                                            <li><a href="index.html" role="menuitem" tabindex="-1">home</a></li>
                                            <li><a href="jobs.html" role="menuitem" tabindex="-1">Browse Job</a></li>
                                            
                                            
                                            <li><a href="contact.html" role="menuitem" tabindex="-1">Contact</a></li>
                                        </ul></div></div>
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
						<h3 class="mb-30">Please fill the following information</h3>


						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

							<div class="mt-10">
								<input type="text" name="student_first_name" placeholder="Student First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Student First Name'" required="" class="single-input">
							</div><br>
							<div class="mt-10">
								<input type="text" name="student_last_name" placeholder="Student Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Student Last Name'" required="" class="single-input">
							</div><br>
							<div class="mt-10"> <textarea class="single-textarea" name="introduction" placeholder="Introduction" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Breif Introduction'" required=""></textarea> 
                            </div>


							<div class="mt-10">
                                        <div class="single_field">
                                            <select class="wide" style="display: none;" name ="status">
                                            <option data-display="Status">select</option>
                                    <?php 
                                        $result1 = $mysqli->query("SELECT status FROM student_status ");
                                    while($rows = $result1->fetch_assoc()) {
                                        $status = $rows['status']; 
                                        echo"<option value ='$status'> $status </option>"; }

                                         ?>     
                                         	
                                      </select>

                                    </div><br>

							<div class="mt-10">
                                        <div class="single_field">
                                        <select class="wide" style="display: none;" name ="program">
                                        <option data-display="program Enrolled">select</option>
                                    <?php 
                                    $result = $mysqli->query("SELECT program_Enrolled FROM program ");
                                    while($rows = $result->fetch_assoc()) { $program_Enrolled =
                                         $rows['program_Enrolled']; echo"
                                         <option value ='$program_Enrolled'>
                                         $program_Enrolled </option>"; }

                                         ?>
                                        </select>
                                            
                                        
                                        </div><br><br>


							    <div class="mt-10">
								<div class="custom-file">
                                          <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                          <label class="custom-file-label" for="inputGroupFile03">Upload Resume</label>
                                        </div><br> <br>
							<div class="custom-file">
                                          <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                          <label class="custom-file-label" for="inputGroupFile03">Upload Cover Letter</label>
                                        </div><br>
							<div class="button-group-area mt-40">
				
				<a href="#" class="genric-btn success circle">Submit</a>
				
			</div>
						
					</div></form>
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