<?php
if(isset($_SESSION["uname"]))
  {
    ?>

    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
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


  // code...
  unset($_SESSION["uname"]);
  session_unset();

  // destroy the session
  session_destroy();
header( "Refresh:5; url=index.html");
}

?>
