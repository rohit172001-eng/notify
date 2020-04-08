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
  $rollno=mysqli_real_escape_string($conn,$_POST["rollno"]);
  $phno=mysqli_real_escape_string($conn,$_POST["phno"]);
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
                    <input type="text" id="fname" name="fname" placeholder="First name" value="<?php echo $fname; ?>" autofocus required>
                </li>
                <li>
                    <label for="fname">Last name:</label>
                    <input type="text" id="lname" name="lname" placeholder="Lastname" value="<?php echo $lname; ?>" required>
                </li>
                <li>
                    <label for="email" >email:</label>
                    <input type="text"  id="email" name="email" placeholder="mymail@gmail.com" value="<?php echo $email; ?>"  required>
                </li>
                <li>
                    <label for="phno" >Phno:</label>
                    <input type="text"  id="phno" name="phno" placeholder="10-digit" value="<?php echo $phno; ?>">
                </li>
                <li>
                    <label for="rollno">Roll Number:</label>
                    <input type="text" id="rollno" name="rollno" placeholder="1602-18-735-031" value="<?php echo $rollno; ?>">
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type ="password" id="password" name="password" placeholder="Password" pattern=".{6,}"
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

    $sql = "SELECT * FROM users WHERE email='".$email."'";
    $result = $conn->query($sql);
    if($result->num_rows==0)
    {
        $sql = "INSERT INTO users (name,email,pass,rollno,phno) VALUES ('$fname', '$email', '$pass','$rollno','$phno')";//preparing query to insert
        if(mysqli_query($conn, $sql)){
            alert("Records added successfully.");
            alert("REGISTRATION SUCCESSFULLL");
        } else{
            alert("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
        }
    }
    else {
      alert("Email ID Already registered....Redirecting to Login page..");
      header( "Refresh:1; url=index.html", true, 303);
      //header("Location:index.html");
    }



    // code...
  }

}
 ?>
