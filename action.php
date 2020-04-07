<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if(isset($_POST['submit']))
{
  include 'db_connect.php';
  $conn = OpenCon();//function to connect to database
  //filtering input before going to database
  $pass=mysqli_real_escape_string($conn,$_POST["password"]);
  $cpass=mysqli_real_escape_string($conn,$_POST["confirmpassword"]);
  $fname=mysqli_real_escape_string($conn,$_POST["fname"]);
  $lname=mysqli_real_escape_string($conn,$_POST["lname"]);
  $email=mysqli_real_escape_string($conn,$_POST["email"]);
  if ($pass!=$cpass) {
    alert("PASSWORDS NOT SAME");
    // header("Location:kp.html");
    // header( "Refresh:0; url=index.html", true, 303);
    ?>
<!DOCUMENT html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registration form </title>
        <link rel="shortcut icon" href="https://1.bp.blogspot.com/-NglZlyont9M/VFIUvVXoX_I/AAAAAAAAMtc/heLvdxujhqw/s1600/VCE%2Bexam%2Bsimulator%2BIcon.png" type="image/png">
        <link rel="stylesheet" href="style.css">
    </head>

    <body >
    <div class="page">                                                    
         <form action="action.php" method="post">
                <h1 >Register to get Notification for VCE website changes</h1>
                <hr></hr>
             <ul class="box">
                <li>
                    <label for="fname" >First name:</label>
                    <input type="text" id="fname" name="fname" placeholder="First name" autofocus required>
                </li>
                <li>
                    <label for="fname">Last name:</label>        
                    <input type="text" id="lname" name="lname" placeholder="Lastname" required>
                </li>
                <li>
                    <label for="email" >email:</label>
                    <input type="text"  id="email" name="email" placeholder="mymail@gmail.com" required>
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type ="password" id="password" name="password" placeholder="Password" pattern=".{8,}"
                    title="minimum 8 characters" required>
                </li>
                <li>
                    <label for="confirmpassword">Confirm Password:</label>
                    <input type ="password"  id=" confirmpassword" name="confirmpassword" placeholder="Confirm Password" required><br>
                </li>
                <li>
                      <input type="submit" name="submit" value="Register" >
                </li>
        </form>
        </div>
    </body>
</html>

    <?php
    // code...
  }
  else {
    alert("REGISTRATION SUCCESSFULLL");
    $sql = "INSERT INTO users (name,email,pass) VALUES ('$fname', '$email', '$pass')";//preparing query to insert
    if(mysqli_query($conn, $sql)){
        alert("Records added successfully.");
    } else{
        alert("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
    }


    // code...
  }

}
 ?>
