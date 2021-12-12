<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<!doctype html>
<html lang="en">

  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Studio | Photography</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:400,700|Hepta+Slab:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

     <style>
        
        .sergey{
            text-align: center;
            
            background: linear-gradient(
		-45deg, 
		#FF3877 25%, 
		#FF3877 25%, 
		#FF3877 50%, 
		#4bc0c8 50%, 
		#4bc0c8 75%,
                #FF3877 75%, 
		#FF3877);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	background-size: 20px 20px;
	background-position: 0 0;
	animation: stripes 1s linear infinite;
        }        
    </style>
  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.php" class="font-weight-bold">
				<img src="images/logo.png" class="img-iconx">
				</a>
			  
             </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="index.php" class="nav-link">Home</a></li>
                  <li><a href="photography.php" class="nav-link">Photography</a></li>
                  <li><a href="blog.php" class="nav-link">Blog</a></li>
				  <li><a href="contact.php" class="nav-link">Contact</a></li>
				  <li><a href="about.php" class="nav-link">About</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>
 <?php
                $conx = mysqli_connect('localhost', 'edeck_master','redonion363','edeck_anupam_gallery');
		$hid_value=$_GET['processing'];
		  ?>
        
        
                                            <div class="ftco-blocks-cover-1">
                                              <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('images/hero_1.jpg')">
                                                <div class="container">
                                                  <div class="row align-items-center justify-content-center text-center">
                                                    <div class="col-md-7">
                                                      <span class="d-block mb-3 text-white" data-aos="fade-up">Images<span class="mx-2 text-primary">&bullet;</span> by Anupam Studio</span>
                                                        <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100"> <?php echo $hid_value ?></h1>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>';
                                     

    <div class="site-section">
      <div class="container">

        <div class="row mb-5 ">
          <div class="col-md-7 text-center mx-auto">
            <span class="subtitle-39293">My Works</span>
            <h2 class="serif">See My Works</h2>
          </div>
        </div>
       
            <div class="row">
              <?php
                    $conx = mysqli_connect('localhost', 'edeck_master','redonion363','edeck_anupam_gallery');

                      $sql = "SELECT keyword FROM prefixx where filecategory like '$hid_value'  ";
                      $stmt= mysqli_stmt_init($conx);
                     if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo "Failed to prepare statement";
                            }
                            else{
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                    while($row = mysqli_fetch_assoc($result)){
                                     echo '
                                        <div class="col-lg-6 col-md-6 mb-6">
                                            <div class="post-entry-1 h-100">
                                              <a href="memories.php?image='.$row["keyword"].'">
                                                <div class="post-entry-1-contents">
                                                <h1 class="sergey" >'.$row["keyword"].'</h1>
                                               </div>
                                               <div class="post-entry-1-contents">
                                                <h6 style=" text-align: center; color: #2a2a2a;">Check out memorable journey</h6>
                                               </div>
                                              </a>
                                              <hr>
                                            </div>
                                        </div>' ;
                        }
                    }           
                ?>   
            </div>
        </div>
    </div> <!-- END .site-section -->



  

    <div class="site-section">
      <div class="container">
        <div class="row mb-5 ">
          <div class="col-md-7 text-center mx-auto">
            <span class="subtitle-39293">See The Video</span>
            <h2 class="serif">See The Video</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-8">

            <a href="https://vimeo.com/191947042" data-fancybox  class="btn-video_38929">
              <span><span class="icon-play"></span></span>
              <img src="images/img_1.jpg" alt="Image" class="img-fluid">
            </a>
          </div>
        </div>
      </div>
    </div>

    

    <div class="site-section bg-white">
      <div class="container">
        <div class="row mb-5 ">
          <div class="col-md-7 text-center mx-auto">
            <span class="subtitle-39293">News</span>
            <h2 class="serif">Events</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <div class="mb-4">
				<span class="icon-star text-warning"></span>
				<span class="icon-star text-warning"></span>
				<span class="icon-star text-warning"></span>
				<span class="icon-star text-warning"></span>
				<span class="icon-star text-warning"></span>
			   </div>
				<a href="single.php">
					<img src="images/img_1.jpg" alt="Image"
					class="img-fluid">
				</a>
				<div class="post-entry-1-contents">
                
					<h2><a href="single.php">Best photographer</a></h2>
					<span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
					<p>Concept and ideas of anupam studios are very great. You will be more than satisfied, We had a destination wedding and anupam sir as always did great with camera.</p>
				</div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <div class="mb-4">
				<span class="icon-star text-warning"></span>
				<span class="icon-star text-warning"></span>
				<span class="icon-star text-warning"></span>
				<span class="icon-star text-warning"></span>
				<span class="icon-star text-warning"></span>
			   </div>
			  <a href="single.php">
                <img src="images/img_2.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="single.php">Great photos</a></h2>
                <span class="meta d-inline-block mb-3">March 23, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>Anupam sir has great ideas, his ideology was beautiful and great camera quality. He uses best in class camera's, I will suggest to take sir for your wedding photos for granted.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <div class="mb-4">
				<span class="icon-star text-warning"></span>
				<span class="icon-star text-warning"></span>
				<span class="icon-star text-warning"></span>
				<span class="icon-star text-warning"></span>
				<span class="icon-star text-warning"></span>
			   </div>
			  <a href="single.php">
                <img src="images/img_3.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="single.php">Lovely clicks</a></h2>
                <span class="meta d-inline-block mb-3">April 18, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>We shot at different locations, sir found the best spots for our wedding shoot and we are truly impressed.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h2 class="footer-heading mb-3">About Me</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
          </div>
          <div class="col-lg-8 ml-auto">
            <div class="row">
              <div class="col-lg-6 ml-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Privacy policy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-12">
			<ul class="social-icon">
								<li><a href="#" class="icon-facebook" ></a></li>
								<li><a href="#" class="icon-instagram" ></a></li> 
								<li><a href="#" class="icon-twitter" ></a></li><li><a href="https://pinterest.com/ayush_rambhad" class="icon-pinterest" ></a></li>
								<li><a href="#" class="icon-mail_outline" ></a></li>
							</ul>
			<div class="border-top pt-5">
             
			<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </p>
			<P> Made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://edeck.live/" target="_blank" >Edeck</a></p>
            
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>


