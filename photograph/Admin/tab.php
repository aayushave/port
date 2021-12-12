<?php
  

session_start(); 
   

if (!isset($_SESSION['username'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: login.php'); 
} 
   
 
if (isset($_GET['logout'])) { 
    session_destroy(); 
    unset($_SESSION['username']); 
    header("location: login.php"); 
} 
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Anupam Studio | Photographer</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">

                    <img src="assets/img/logo.png" />
                </a>

            </div>

            <div class="right-div">
                <a href="logout.php" class="btn btn-danger pull-right">LOG OUT</a>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
	<?php  if (isset($_SESSION['username'])) : ?> 
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php" >Welcome  <?php echo $_SESSION['username']; ?>  </a></li>
                            <li><a href="index.php" >DASHBOARD</a></li>
                            <li><a href="tab.php" class="menu-top-active">IMAGE TAB</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
	 <?php endif ?> 
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">TABS & PANELS</h4>
                
                            </div>

        </div>
             <div class="row">
                 <div class="col-md-6">
                <div class="panel panel-primary">
                         <div class="panel-heading">
                            INSERT NEW PREFIX (Ex. AMIT-PRIYANKA)
                         </div>
                         <div class="panel-body">
                                <form method="POST" action="insert.php" role="form">
                                         <div class="form-group">
                                             <label> Enter New Prefix Name (Ex. AMIT-PRIYANKA)</label>
                                             <input class="form-control" type="text" name="keyword" required/>
                                           <!--  <p class="help-block">Help text here.</p> -->
                                         </div>
                                         <div class="form-group">
                                      <label>Select Image Catagory</label>
                                      <select class="form-control" name="filecategory" id="filetitle">
                                        <option class="form-control" value="">select any one</option>
                                        <option value="PRE-WEDDING">PRE-WEDDING</option>
                                        <option value="WEDDING">WEDDING</option>
                                        <option value="BUMP-CLICKS">BUMP-CLICKS</option>
                                        <option value="TALKIES">TALKIES</option>
                                        <option value="FOLIO">FOLIO</option>
                                        <option value="LITTLE-ONES">LITTLE-ONES</option>
                                       </select>
                                   </div>
                                        <button type="submit" class="btn btn-info">Insert Prefix Details </button>
                                        <button type="reset" class="btn btn-info">Clear Details </button>

                                 </form>
                               </div>
                 </div>
            </div>
                 
                 
            <?php
             include_once 'includes/dbh.inc.php';
             $result=mysqli_query($con2,"SELECT keyword,filecategory FROM prefixx ");
		  if(isset($_SESSION['username'])){ 
            echo        ' <div class="col-md-6">
                             <div class="panel panel-info">
                                <div class="panel-heading">
                               INSERT IMAGE
                             </div>
                          <div class="panel-body">
                               <form role="form" action="includes/gallery-upload.inc.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                   <label>Select Image Name</label>
                                   <select class="form-control" name="filename" id="Keyword">
                                    <option class="form-control" value="">select any one</option>

                         ';                 
                                    while($row=mysqli_fetch_array($result))
                                    {   echo '<option value="'.$row["keyword"].'|'.$row["filecategory"].'">'.$row["keyword"].'|'.$row["filecategory"].'</option>';

                                    };
                                        ?>
                 <?php echo'
                                      </select>
                                      </div>
                                    
                                   <div class="form-group">
                                       <label>Attach Image </label>
                                       <input type="file" name="file"/>
                                   </div>

                                   <button type="submit" name="submit" class="btn btn-primary">Upload Image </button>
                                   <button type="reset" class="btn btn-primary">Reset Fields</button>

                               </form>
                           </div>
                       </div>
                   </div>

               ';
              }
            ?>
             </div>
             
           <div class="row">
              <?php
              
		
		  $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC;";
		  $stmt= mysqli_stmt_init($conn);
		 if(!mysqli_stmt_prepare($stmt,$sql)){
			echo "Failed to prepare statement";
			}
                        else{
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				
				while($row = mysqli_fetch_assoc($result)){
				 echo '<div class="col-md-4 col-sm-4">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    Image Panel  
                                                </div>
                                                <div class="panel-body">
                                                    <img  style=" max-height:100%;max-width:100%;" src="../uploads/'.$row["titleGallery"].'/'.$row["imgFullNameGallery"].'">
                                                </div>
                                                <div class="panel-footer">
                                                    '.$row["orderGallery"].'
                                                </div>
                                            </div>
                                        </div>';
                                 
                                }
                        }
                ?>                            
                
            </div>		
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                     &copy; 2020 Anupam Studio |<a href="https://edeck.live/" target="_blank"  >  Made with love by Edeck</a> 
                </div>

            </div>
        </div>
    </section>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>