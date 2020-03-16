<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Studentlogin.php");
    exit;
}

// Include config file
 require_once "config.php";


 $sql = "SELECT post_id, job_title, job_description, post_date, post_end_date from post";


// data for output

$result = $link->query($sql);

if ($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()) {     
    $Job_title = $row["job_title"];
    $job_description = $row["job_description"];
    $post_date = $row["post_date"];
    $post_end_date = $row["post_end_date"];
   
    }

}

// if(!empty($location_id)){

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
                                            <li><a href="jobslisting.php">Browse Job</a></li>
                                            </li>
                                   

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="index.html">Logout</a>
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
                        <h3>
                            
                              <?php  
                                if(!empty($Job_title))
                                {
                                    echo $Job_title;
                                }  else
                                {
                                echo " ";
                                }
                                ?> 
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="img/svg_icon/1.svg" alt="">
                                </div>
                                <div class="jobs_conetent">

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

                                    </h4>

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
                                         ?> </p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="d-none d-lg-block">
                                        <a class="boxed-btn3" href="#apply">Apply Now</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">

                            <h4>Job description</h4>
                            <p> 
                                <?php  
                         if(!empty($job_description))
                            {
                            echo $job_description;
                            }  else
                            {
                            echo " ";
                            }
                            ?> 
                    </p>
                            
                        </div>
                   
                     
                     
                    </div>
                    <div class="apply_job_form white-bg">
                        <h4 id="apply">Apply for the job</h4>


                    

                     <!--Application Form Start  -->

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Your name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    
                                    <div class="mt-10"> <textarea class="single-textarea" name="Note" placeholder="Note to employeer" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Note to employeer'" required=""></textarea> 
                                    </div><br>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <button type="button" id="inputGroupFileAddon03"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                          </button>
                                        </div>
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                          <label class="custom-file-label" for="inputGroupFile03">Upload resume</label>
                                        </div>
                                      </div>
                                </div>
								<div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <button type="button" id="inputGroupFileAddon03"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                          </button>
                                        </div>
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                          <label class="custom-file-label" for="inputGroupFile03">Upload CV</label>
                                        </div>
                                      </div>
                                </div>
                               
                                <div class="col-md-12">
                                    <div class="submit_btn">
                                        <button class="boxed-btn3 w-100" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                <!--Application Form End  -->



                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Job Summery</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li>Published on: 
                                <span>

                            <?php  
                         if(!empty($post_date))
                            {
                            echo $post_date;
                            }  else
                            {
                            echo " ";
                            }
                            ?> 
                        </span></li>


                                <li>Close Date: 
                                <span>
                                    <?php  
                         if(!empty($post_end_date))
                            {
                            echo $post_end_date;
                            }  else
                            {
                            echo " ";
                            }
                            ?> 
                                </span></li>
                                
                            <li>Location: 
                                <span>
                            <?php  
                         if(!empty($location))
                            {
                            echo $location;
                            }  else
                            {
                            echo " ";
                            }
                            ?>
                                </span></li>
                               
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    

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
    <script src="js/gijgo.min.js"></script>



    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>


    <script src="js/main.js"></script>
</body>

</html>