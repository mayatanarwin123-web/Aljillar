<?php
require "dbcon.php"; 
$con=mysqli_connect("localhost","root","","users");  
  $insert="Insert into users(id,Name,Email,Password,Role) values('1','Mg Aung Aung','mama12@gmail.com','1234','user')" ;
  $res=mysqli_query($con,$insert);
  if ($res){
      echo "Insert successfully."    ;
  }
?>