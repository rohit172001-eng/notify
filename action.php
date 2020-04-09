<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if(isset($_POST['submit']))
{
  include 'db_connect.php';
  $conn = OpenCon();//function to connect to database
  // echo "connected to database successfully";
  // alert("connected to database successfully");
  //filtering input before going to database
  // $pass=mysqli_real_escape_string($conn,$_POST["password"]);
  // $cpass=mysqli_real_escape_string($conn,$_POST["confirmpassword"]);
  // $fname=mysqli_real_escape_string($conn,$_POST["fname"]);
  // $lname=mysqli_real_escape_string($conn,$_POST["lname"]);
  // $email=mysqli_real_escape_string($conn,$_POST["email"]);
  // $rollno=mysqli_real_escape_string($conn,$_POST["rollno"]);
  // $phno=mysqli_real_escape_string($conn,$_POST["phno"]);
  $pass=clean($_POST["password"]);
  $cpass=clean($_POST["confirmpassword"]);
  $fname=clean($_POST["fname"]);
  $lname=clean($_POST["lname"]);
  $email=clean($_POST["email"]);
  $rollno=clean($_POST["rollno"]);
  $phno=clean($_POST["phno"]);
  
  if ($phno=="") {
    $rollno=123;
  }
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
        <link rel="stylesheet" href="css/style.css">
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
                    <input type="text"  id="phno" name="phno" placeholder="10-digit" value="<?php echo $phno; ?>" pattern=".{10,}"
                    title="Invalid Number">
                </li>
                <li>
                    <label for="rollno">Roll Number:</label>
                    <input type="text" id="rollno" name="rollno" placeholder="1602-18-735-031" value="<?php echo $rollno; ?>" pattern=".{12,}"
                    title="Enter your 12 digit roll number">
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
            //alert("Records added successfully.");
            alert("REGISTRATION SUCCESSFULLL");
                ?>

                <!DOCTYPE html>
                <html lang="en" dir="ltr">
                  <head>
                    <meta charset="utf-8">
                    <link rel="shortcut icon" href="https://1.bp.blogspot.com/-NglZlyont9M/VFIUvVXoX_I/AAAAAAAAMtc/heLvdxujhqw/s1600/VCE%2Bexam%2Bsimulator%2BIcon.png" type="image/png">

                    <title>Registration Successfull</title>
                    <meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" />
                    <link rel="shortcut icon" href="https://1.bp.blogspot.com/-NglZlyont9M/VFIUvVXoX_I/AAAAAAAAMtc/heLvdxujhqw/s1600/VCE%2Bexam%2Bsimulator%2BIcon.png" type="image/png">
                    <link rel="stylesheet" href="css/style.css">
                    <link rel="stylesheet" href="css/type.css">


                  </head>
                  <body>
                <ul class="box">
                  <li>

                  </li>

                  <div class="page">
                    <div class="typewriter">
                    <center><h5>Registration Successfull....</h5></center>
                  </div>

                          <hr></hr>
                          <br>
                       <ul class="box">
                          <!-- <li>
                              <label for="fname" >First name:*</label>
                              <input type="text" id="fname" name="fname" placeholder="First name" autofocus required>
                          </li> -->

                            <span>&#9993;</span>
                            <div class="typewriter">
                            <center><h5>Contact Us ....</h5></center>
                            <h6 style="font-family:courier;">maheshstores.vr@gmail.com</h6>
                          </div>


                        <!-- <span>&#9758;</span> -->
                <br><br>
                          <div class="typewriter">
                          <center><h5 style="font-family:courier;">Thank You....</h5></center>
                          </div>
                          <br><br>
                      <div class="page">
                        <span>&#9997;</span>
                        <div class="typewriter">
                        <center><h5>About Us ....</h5></center>
                        <h6  style="font-family:courier;">Front-end Developer - keerthi</h6>
                        <h6 style="font-family:courier;">Back-end Developer - Rohit Lingala</h6>
                      </div>

                      </div>




                  </body>
                </html>
                <?php

                header( "Refresh:7; url=timer.html", true, 303);
              // code...





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
