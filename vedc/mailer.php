<?php 
if(isset($_POST['submit'])){
    $to = "edeckdevops@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $subject = $_POST['subject'];
    $subject2 = $_POST['subject'];;
    $message = $first_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "<script>
alert('Mail Sent Successfully | We will reply shortly');
window.location.href='https://edeck.live/vedc/';
</script>";
    }
?>



<?php $name = $_POST['first_name'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent=$name . " wrote the following:" . "\n\n" . $_POST['message'];
$recipient = "edeckdevops@gmail.com";
$subject = $_POST['subject'];
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "<script>
alert('Mail Sent Successfully | We will reply shortly');
window.location.href='https://edeck.live/opensimulator/';
</script>";
?>