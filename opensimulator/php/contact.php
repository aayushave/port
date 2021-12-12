
<?php $name = $_POST['cf-name'];
$email = $_POST['cf-email'];
$message = $_POST['cf-message'];
$formcontent="From: $name \n Message: $message";
$recipient = "edeckdevops@gmail.com";
$subject = $_POST['subject'];
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "<script>
alert('Mail Sent Successfully | We will reply shortly');
window.location.href='https://edeck.live/opensimulator/';
</script>";
?>