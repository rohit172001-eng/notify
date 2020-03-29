<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if(isset($_POST['submit']))
{
  $pass=$_POST["password"];
  $cpass=$_POST["confirmpassword"];
  if ($pass!=$cpass) {
    alert("PASSWORDS NOT SAME");
    // header("Location:kp.html");
    header( "Refresh:0; url=index.html", true, 303);
    // code...
  }

  echo $pass;
}
 ?>
