<?php
session_start();
$db1 = mysqli_connect('localhost','aayushr1_image','redonion363','aayushr1_adm');

if (!isset($_SESSION['username'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: login.php'); 
} 
   
 
if (isset($_GET['logout'])) { 
    session_destroy(); 
    unset($_SESSION['username']); 
    header("location: login.php"); 
} 

$ordgallery=mysqli_real_escape_string($db1, isset($_POST['delete_img'])) ;

if (isset($_POST['delete_img'])) { 
      
  
        $query = "DELETE FROM gallery WHERE gallery.orderGallery = '$ordgallery'"; 
        $results = mysqli_query($db1, $query);
   
        
        if (mysqli_num_rows($results) == 1) { 
             echo "<script>
                 alert('File Uploaded');
                 window.location.href='../tab.php';
                 </script>";             
             
        } 
        else { 
            echo "<script>
                 alert('File Uploaded');
                 window.location.href='../tab.php';
                 </script>";
        } 
    } 

?>