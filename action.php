<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if(isset($_POST['submit']))
{
  $pass=$_POST["password"];
  $cpass=$_POST["confirmpassword"];
  $fname=$_POST["fname"];
  $lname=$_POST["lname"];
  $email=$_POST["email"];
  if ($pass!=$cpass) {
    alert("PASSWORDS NOT SAME");
    // header("Location:kp.html");
    // header( "Refresh:0; url=index.html", true, 303);
    ?>
    <!DOCUMENT html>
    <html>
        <head>
            <title>Registration form </title>
        </head>
        <body>
            <form style="font:georgia" action="#" method="post">
                <fieldset>

                    <legend align ="center">Register</legend><br>
                    <pre>
                     <label for="fname" >First name:</label>
                     <input type="text"  name="fname" placeholder="First name" value="<?php print $fname;?>" required><br>
                     <label for="fname">Last name:</label>
                     <input type="text" id="lname" name="lname" placeholder="Lastname" value="<?php print $lname;?>" required><br>
                     <label for="email" >email:</label>a
                     <input type="text" id="email" name="email" placeholder="mymail@gmail.com" value="<?php print $email;?>" required><br>
                     <label for="password">Password:</label>
                     <input type ="password" id="password" name="password" placeholder="Password" pattern=".{8,}"
                                                                  title="minimum 8 characters"required><br>
                     <label for="confirmpassword">Confirm Password:</label>
                     <input type ="password"  name="confirmpassword" placeholder="Confirm Password" required><br>
                     <input type="submit" name="submit" value="Register">
                    </pre>
                </fieldset>
            </form>

        </body>
    </html>

    <?php
    // code...
  }
  else {
    alert("REGISTRATION SUCCESSFULLL");
    // code...
  }

}
 ?>
