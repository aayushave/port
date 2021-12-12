<?php 

$from = $_REQUEST['email']; 
$first_name = $_REQUEST['first_name'];
$subject = $_REQUEST['subject'];
$message = $first_name . " wrote the following:" . "\n\n" . $_REQUEST['message'];
$to = "ayush.rambhad19@vit.edu"; 

// prepare header
$header = "MIME-Version: 1.0" . "\r\n";
$header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$header .= 'From: '. $_REQUEST['first_name'] .' <'. $_REQUEST['email'] .'>'. "\r\n";
$header .= 'Reply-To:  '. $_REQUEST['first_name'] . ' <'. $_REQUEST['email'] .'>'. "\r\n";
$header .= 'Cc:  ' . $_REQUEST['email'] . "\r\n";
$header .= 'Bcc:  ' . 'EdeckDevops@gmail.com' . "\r\n";
$header .= 'X-Mailer: PHP/' . phpversion();


if(mail($to,$subject,$message,$header)){
 echo ("Mail Sent. Thank you " . $first_name . ", we will contact you shortly.");
 //echo($header);
 
}else{
    echo ($header);
}

?>