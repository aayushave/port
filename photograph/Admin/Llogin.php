<?php  
  

session_start(); 
   

$username = ""; 
$email    = ""; 
$errors = array();  
$_SESSION['success'] = ""; 
   

$db = mysqli_connect('localhost', 'edeck_master', 'redonion363', 'edeck_anupam_admin'); 
   

if (isset($_POST['login_user'])) { 
      
    // Data sanitization to prevent SQL injection 
    $username = mysqli_real_escape_string($db, $_POST['username']); 
    $password = mysqli_real_escape_string($db, $_POST['password']); 
   
    // Error message if the input field is left blank 
    if (empty($username)) { 
        array_push($errors, "Username is required"); 
    } 
    if (empty($password)) { 
        array_push($errors, "Password is required"); 
    } 
   
     
    if (count($errors) == 0) { 
          
        // Password matching 
        $password = md5($password); 
          
        $query = "SELECT * FROM users WHERE (username= 
                '$username' OR email='$username') AND password='$password'"; 
        $results = mysqli_query($db, $query);
   
        
        if (mysqli_num_rows($results) == 1) { 
            
            $_SESSION['username'] = $username; 
            header('location: index.php'); 
        } 
        else { 
            echo "<script>
                                alert('Incorrect Credentials | Try Again');
                                window.location.href='login.php';
                                </script>";
        } 
    } 
} 
   

?>