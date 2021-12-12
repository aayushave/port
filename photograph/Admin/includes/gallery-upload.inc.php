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
if(isset($_POST['submit'])){
	
	$Nname= $_POST['filename'];
        $result_explode = explode('|', $Nname);
         $newFileName=$result_explode[0];    
	
        $imageTitle=strtolower($result_explode[1]);
	if(empty($newFileName)){
		$newFileName ="gallery";
	} else{
		$newFileName = strtolower(str_replace("","-",$newFileName));
	}
        
      if($imageTitle=="wedding"){
          $fileDestination = "../../uploads/wedding/";
      }
      if($imageTitle=="pre-wedding"){
          $fileDestination = "../../uploads/pre-wedding/";
      }
      if($imageTitle=="little-ones"){
          $fileDestination = "../../uploads/little-ones/";
      }
      if($imageTitle=="talkies"){
          $fileDestination = "../../uploads/talkies/";
      }
      if($imageTitle=="folio"){
          $fileDestination = "../../uploads/folio/";
      }
      if($imageTitle=="bump-clicks"){
          $fileDestination = "../../uploads/bump-clicks/";
      }

	
	$file = $_FILES['file'];
	
	$fileName = $file["name"];
	$fileType = $file["type"];
	$fileTempName = $file["tmp_name"];
	$fileError = $file["error"];
	$fileSize = $file["size"];
	
	$fileExt = explode(".", $fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	$allowed = array("jpg", "jpeg", "png");
	
	if(in_array($fileActualExt,$allowed)){
		if($fileError === 0){
			if($fileSize < 5000000 ){
				$imageFullName = $newFileName . "_" . uniqid("", false) ."." . $fileActualExt;
				$fileDestination = $fileDestination . $imageFullName;
				
				include_once "dbh.inc.php";
				
				if(empty($imageTitle)){
					echo "<script>
                                        alert('Image Title Required');
                                        window.location.href='../tab.php';
                                        </script>";
					exit();
					
				}else{
					$sql = "SELECT *  FROM gallery";
					$stmt = mysqli_stmt_init($con2);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						     echo "<script>
                                                    alert('SQL Statement Failed for select');
                                                    window.location.href='../tab.php';
                                                    </script>";           
					}else{
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						$rowCount = mysqli_num_rows($result);
						$setImageOrder = $rowCount + 1;  
						
						$sql = " INSERT INTO gallery (orderGallery, titleGallery,imgFullNameGallery) VALUES (?, ?, ?)";
						
						if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "<script>
                                                    alert('Prepare Statement Failed');
                                                    window.location.href='../tab.php';
                                                    </script>";
					} else{
                                            mysqli_stmt_bind_param($stmt,"sss" , $setImageOrder, $imageTitle, $imageFullName);
						mysqli_stmt_execute($stmt);
                                               move_uploaded_file($fileTempName, $fileDestination);
						echo "<script>
                                                    alert('File Uploaded');
                                                    window.location.href='../tab.php';
                                                    </script>";
    
					}
						
					}
				}
				
			}else{
				echo "<script>
                                alert('File size Too Big');
                                window.location.href='../tab.php';
                                </script>";
                                exit();
                                
			}
                       			
		} else{
			echo "<script>
                        alert('Server Error | Contact EDECK');
                        window.location.href='../tab.php';
                        </script>";
			exit();
		}
	}else{
		echo "<script>
                alert('IMAGE FORMAT MISMATCH | JPG JEG PNG Supported');
                window.location.href='../tab.php';
                </script>";
                exit();
	}
	
}

?> 