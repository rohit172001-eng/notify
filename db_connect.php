<?php

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "kp";


 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);


 return $conn;
 }

function CloseCon($conn)
 {
 $conn -> close();
 }

 function clean($value)
  {
     $value= htmlspecialchars($value,ENT_QUOTES);
     $value=strip_tags($value);
     return $value;
     #ENT_QUOTES,'UTF_8'
 }
