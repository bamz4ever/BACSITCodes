<?php


/*
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Studentlogin.php");
    exit;
}

*/


 //   $users_id = $_SESSION["users_id"];
 //   $company_name = $_SESSION["company_name"];
    
     //echo "$company_name";
   // $_SESSION["company_name"] = $company_name;
  //  $_SESSION["company_id"] = $company_id;


// Include config file
 require_once "config.php";



 $sql = "SELECT post_id, job_title, job_description, post_date, post_end_date, location_id from post";


// data for output

$result = $link->query($sql);

if ($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()) {     
    $Job_title = $row["job_title"];
    $job_description = $row["job_description"];
    $post_date = $row["post_date"];
    $post_end_date = $row["post_end_date"];
    $post_end_date = $row["post_end_date"];
   
    }
    
  //  echo "$Job_title <br>";
  //  echo "$job_description <br>";
  //  echo "$post_date <br>";
  //  echo "$post_end_date <br>";

}



//if(!empty($location_id)){

$sql2 = "SELECT * FROM location";


$result1 = $link->query($sql2);

if ($result1->num_rows > 0){

  while($row = $result1->fetch_assoc()) {     
  
    $location = $row["location_name"];
  
    }

  
    }

//}

$link->close();


?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job Board</title>
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
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.min.css">
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
                                            <li><a href="jobs.php">Browse Job</a></li>
                                            <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="candidate.html">Candidates </a></li>
                                                    <li><a href="job_details.php">job details </a></li>
                                                </ul>
                                            </li>
                                      
                                           
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="StudentLogout.php">Logout</a>
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
    <!-- header-end -->

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>4536+ Jobs Available</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="job_filter white-bg">
                        <div class="form_inner white-bg">
                            <h3>Filter</h3>
                            



                          <!-- Form start  -->

                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <input type="text" placeholder="Search keyword">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide">
                                                <option data-display="Location">Location</option>
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
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide">
                                                <option data-display="Category">Category</option>
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
                                        </div>
                                    </div>
                          
                            </form>

                            </div>

                        <!-- Form End  -->


                     
                        
                        <div class="reset_btn">
                            <button  class="boxed-btn3 w-100" type="submit">Reset</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>Job Listing</h4>
                                </div>
                         
                            </div>
                        </div>
                    </div>

                    <div class="job_lists m-0">
                        <div class="row">



  <!-- Job listing and application End  -->

                            <div class="col-lg-12 col-md-12">
                                
                                    <div class="jobs_left d-flex align-items-center">
                                       
                                        <div class="jobs_conetent">

                                            <a href="job_details.php">
                                                <h4>
                                    <?php  
                                    if(!empty($Job_title))
                                    {
                                    echo $Job_title;
                                    }  else
                                    {
                                    echo " ";
                                    }
                                    ?> 
                                                    </h4></a>

                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    <p> <i class="fa fa-map-marker"></i>
                                        <?php  
                                         if(!empty($location))
                                             {
                                        echo $location;
                                         }  else
                                        {
                                        echo " ";
                                          }
                                         ?> 
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            
                                            <a href="job_details.php" class="boxed-btn3">Apply Now</a>
                                        </div>
                                        <div class="date">
                                            <p>Date line:
                                                   <?php  
                                         if(!empty($post_end_date))
                                             {
                                        echo $post_end_date;
                                         }  else
                                        {
                                        echo " ";
                                          }
                                         ?> 
                                            </p>
                                        </div>
                                    </div>
                                
                            </div>

                        </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

    <!-- job_listing_area_end  -->



    <!-- footer start -->
    
   
    <!--/ footer end  -->

    <!-- link that opens popup -->
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
    <!-- <script src="js/gijgo.min.js"></script> -->
    <script src="js/range.js"></script>



    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>


    <script src="js/main.js"></script>


	<script>
        $( function() {
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 24600,
                values: [ 750, 24600 ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] +"/ Year" );
                }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                " - $" + $( "#slider-range" ).slider( "values", 1 ) + "/ Year");
        } );
        </script>
</body>

</html>