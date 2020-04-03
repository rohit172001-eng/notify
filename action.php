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
        <link rel="stylesheet" href="style.css">
    </head>

    <body >
        <img src="https://images.mentalfloss.com/sites/default/files/styles/mf_image_16x9/public/headerbooks.jpg?itok=VXk5ovFG&resize=1100x1100"
                                                                                     width="100%" height="1060%" >
        <form class="box" action="#" method="post">
            <fieldset padding="20px">
                <h1 >Register</h1>
                <hr></hr>
                 <label for="fname" >First name:</label>
                 <input type="text" name="fname" placeholder="First name" value="<?php print $fname;?>" autofocus required>
                 <label for="fname">Last name:</label>
                 <input type="text" name="lname" placeholder="Lastname" value="<?php print $lname;?>" required>
                 <label for="email" >email:</label>
                 <input type="text" name="email" placeholder="mymail@gmail.com" value="<?php print $email;?>" required>
                 <label for="password">Password:</label>
                 <input type ="password" name="password" placeholder="Password" pattern=".{8,}"
                                                                         title="minimum 8 characters" required>
                 <label for="confirmpassword">Confirm Password:</label>
                 <input type ="password" name="confirmpassword" placeholder="Confirm Password" required><br>
                 <input type="submit" name="submit" value="Register" >
            </fieldset>
        </form>
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
