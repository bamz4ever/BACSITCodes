<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: companyLogin.php");
    exit;
}


// Include config file
 require_once "config.php";
 
// Define variables and initialize with empty values
$POST_JOB_CATEGORY = $POST_JOB_TITLE = $POST_JOB_DESCRIPTION = $POST_JOB_FIELD = $POST_DATE = $POST_CLOSE_DATE =  $POST_CITY = $post_status = "";
$POST_JOB_CATEGORY_err = $POST_JOB_TITLE_err = $POST_JOB_DESCRIPTION_err = $POST_JOB_FIELD_err = $POST_DATE_err = $POST_CLOSE_DATE_err = $POST_CITY_err = $post_status_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$POST_JOB_CATEGORY = $_POST['POST_JOB_CATEGORY'];
	$POST_JOB_TITLE = $_POST['POST_JOB_TITLE'];
	$POST_JOB_DESCRIPTION  = $_POST['POST_JOB_DESCRIPTION'];
	$POST_JOB_FIELD  = $_POST['POST_JOB_FIELD'];
    $POST_DATE  = $_POST['POST_DATE'];
	$POST_CLOSE_DATE  = $_POST['CLOSE_DATE'];
	$POST_CITY  = $_POST['POST_CITY'];
    $post_status = $_POST['post_status'];
	
	
	
    
    // Check input errors before inserting in database
    if(empty($POST_JOB_CATEGORY_err) && empty($POST_JOB_TITLE_err) && empty($POST_JOB_DESCRIPTION_err) && empty($POST_JOB_FIELD_err) && empty($POST_DATE_err) && empty($CLOSE_DATE_err) && empty($POST_CITY_err) && empty($post_status_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO post (job_cat_id, job_title, job_description, field_id, post_date, post_end_date, location_id, company_id, post_status_id) VALUES (?, ?, ?, ?, ?, ?,?,?,?)";
         
        $stmt = mysqli_prepare($link, $sql);
		
		if (!$stmt) {
		echo "$link->error" ;   die();
		}

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ississiii", $param_POST_JOB_CATEGORY, $param_POST_JOB_TITLE, $param_POST_JOB_DESCRIPTION, $param_POST_JOB_FIELD, $param_POST_DATE,  $param_POST_CLOSE_DATE,   $param_POST_CITY, $param_Company_id, $param_post_status);
            
            // Set parameters
            $param_POST_JOB_CATEGORY = $POST_JOB_CATEGORY;
            $param_POST_JOB_TITLE = $POST_JOB_TITLE;
			$param_POST_JOB_DESCRIPTION = $POST_JOB_DESCRIPTION;
			$param_POST_JOB_FIELD = $POST_JOB_FIELD;
            $param_POST_DATE = $POST_DATE;
			$param_POST_CLOSE_DATE = $POST_CLOSE_DATE;
			$param_POST_CITY = $POST_CITY;
            $param_Company_id = $_SESSION["company_id"];
            $param_post_status = $post_status;
            
            // Attempt to execute the prepared statement



            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: CompanyProfilePage.php");
            } else{
                echo "Something went wrong. Please try again later.";
				echo die($link->error);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Job Posting</title>
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
                                            <li><a href="">Manage Job Postings</a></li>
                                            
                                            
                                            <li><a href="">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="companyLogout.php">Logout</a>
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
                        <h3>Job Posting</h3>
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




                        <!-- FORM-start -->


						<h3 class="mb-30">Please fill the following information</h3>

						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="mt-10 <?php echo (!empty($POST_JOB_CATEGORY_err)) ? 'has-error' : ''; ?>">
								<select type="text" name="POST_JOB_CATEGORY" placeholder="JOB CATEGORY"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'JOB CATEGORY'" required
									class="single-input">
									<option data-display="Job Categories">select</option>
							
							<?php
							
							
								$sql = "select job_cat_name, job_cat_id from job_cat";

								$result  =  $link->query($sql);
								
								if ($result) {
									 while($row = $result->fetch_assoc()) {


											echo "<option value='$row[job_cat_id]'>$row[job_cat_name]</option>";
							              
									 }

								}	


                                ?>


							</select>		
                                    <span class="help-block"><?php echo $POST_JOB_CATEGORY_err; ?></span>
							</div><br>
							
													
     <br><br>

                            <div class="mt-10 <?php echo (!empty($POST_JOB_TITLE_err)) ? 'has-error' : ''; ?>">
								<input type="text" name="POST_JOB_TITLE" placeholder="JOB TITLE"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'JOB TITLE'" required
									class="single-input">
                                    <span class="help-block"><?php echo $POST_JOB_TITLE_err; ?></span>
							</div><br>
			


							 <div class="mt-255 <?php echo (!empty($POST_JOB_DESCRIPTION_err)) ? 'has-error' : ''; ?>">
								<textarea name="POST_JOB_DESCRIPTION" cols= "40" rows ="5" placeholder="JOB DESCRIPTION"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'JOB DESCRIPTION'" required
									class="single-input"></textarea>
                                    <span class="help-block"><?php echo $POST_JOB_DESCRIPTION_err; ?></span>
							</div><br>
							
							  <div class="mt-10 <?php echo (!empty($POST_JOB_FIELD_err)) ? 'has-error' : ''; ?>">
								<select type="text" name="POST_JOB_FIELD" placeholder="JOB FIELD"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'JOB FIELD'" required
									class="single-input">
  
                                  <span class="help-block"><?php echo $POST_JOB_FIELD_err; ?></span>
                                  <option data-display="Job FIELD">select</option>
<?php
							         
								$sql = "select field_id, field_name FROM field ";
								$result  =  $link->query($sql);
								
									if ($result) {
									 while($row = $result->fetch_assoc()) {
											echo "<option value='$row[field_id]'>$row[field_name]</option>";
							
									 }
								}	

?>								
							</select>	


                            </div><br>
                            <br><br>
                            
                              <div class="mt-10 <?php echo (!empty($post_status_err)) ? 'has-error' : ''; ?>">
                                <select type="text" name="post_status" placeholder="Post status"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Post status'" required
                                    class="single-input">
  
                                  <span class="help-block"><?php echo $post_status_err; ?></span>
                                  <option data-display="Post status">select</option>
<?php
                                     
                                $sql = "select post_status_id, post_status_name FROM post_status ";
                                $result  =  $link->query($sql);
                                
                                    if ($result) {
                                     while($row = $result->fetch_assoc()) {
                                            echo "<option value='$row[post_status_id]'>$row[post_status_name]</option>";
                            
                                     }
                                }   

?>                              
                            </select>    


                                    
							</div><br>
													
     <br><br>

							<div class="mt-10 <?php echo (!empty($POST_DATE_err)) ? 'has-error' : ''; ?>">
								<input type="date" name="POST_DATE" placeholder="POST DATE"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'POST DATE'" required
									class="single-input">
									<span class="help-block"><?php echo $POST_DATE_err; ?></span>
							</div><br>
							<br><br>
							
							<div class="mt-10 <?php echo (!empty($CLOSE_DATE_err)) ? 'has-error' : ''; ?>">
								<input type="date" name="CLOSE_DATE" placeholder="CLOSE DATE"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'CLOSE DATE'" required
									class="single-input">
									<span class="help-block"><?php echo $POST_CLOSE_DATE_err; ?></span>
							</div><br>

<br><br>

                            



                                 <div class="mt-10 <?php echo (!empty($POST_CITY_err)) ? 'has-error' : ''; ?>">
                                <select type="POST CITY" name="POST_CITY" placeholder="POST CITY"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'POST CITY'" required
                                    class="single-input">
                                    <span class="help-block"><?php echo $POST_CITY_err; ?></span>
                                    <option data-display="location">select</option>
<?php
                            
                            
                                $sql = "select location_id, location_name FROM location ";
                                $result  =  $link->query($sql);
                                
                                    if ($result) {
                                     while($row = $result->fetch_assoc()) {
                                            echo "<option value='$row[location_id]'>$row[location_name]</option>";
                            
                                     }
                                }   

?>                              
                            </select>       
                                    
                            </div><br>
                                <br>
                            
                         <input type="submit" class="btn btn-primary" value="Submit">
            
                    
                
                             </div>
						</form>
					</div>
					</div>
			</div>
		</div>
	</div>

    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                            <p>
                                finloan@support.com <br>
                                +10 873 672 6782 <br>
                                600/D, Green road, NewYork
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".4s">
                            <h3 class="footer_title">
                                Company
                            </h3>
                            <ul>
                                <li><a href="#">About </a></li>
                                <li><a href="#"> Pricing</a></li>
                                <li><a href="#">Carrier Tips</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".5s">
                            <h3 class="footer_title">
                                Category
                            </h3>
                            <ul>
                                <li><a href="#">Design & Art</a></li>
                                <li><a href="#">Engineering</a></li>
                                <li><a href="#">Sales & Marketing</a></li>
                                <li><a href="#">Finance</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
                            <h3 class="footer_title">
                                Subscribe
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit">Subscribe</button>
                            </form>
                            <p class="newsletter_text">Esteem spirit temper too say adieus who direct esteem esteems
                                luckily.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".3s">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->

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
</body>
</html>