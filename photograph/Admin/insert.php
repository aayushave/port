<?php
$con2 = mysqli_connect('localhost', 'edeck_master','redonion363');

if(!$con2)
{
echo "<script>
alert('Server Error | Contact EDECK');
window.location.href='tab.php';
</script>";
}

if(!mysqli_select_db($con2,'edeck_anupam_admin'))
{
echo "<script>
alert('Server Error | Contact EDECK');
window.location.href='tab.php';
</script>";
}

$Name=$_POST['keyword'];
$filecat=$_POST['filecategory'];
$sql="INSERT INTO prefixx (keyword,filecategory) VALUES ('$Name','$filecat')";

if(!mysqli_query($con2,$sql))
{
echo"<script>
alert('".mysqli_error($con2)."');
  window.location.href='tab.php';
  </script>"; 

}

else
{
echo "<script>
alert('".mysqli_error($con2)." Prefix Title Inserted');
  window.location.href='tab.php';
  </script>";
}
      