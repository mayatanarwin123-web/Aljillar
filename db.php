<?php
$con= mysqli_connect("localhost","root","");
mysqli_select_db($con,"users"); 
    
    if(!$con)       
     {   
    die("Couldn't connect".mysql_error());
     }      
?>
