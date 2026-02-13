<?php
require "db.php";
$con = mysqli_connect('localhost','root',''); 
$db = mysqli_query($con,'create database users');   
  $con=mysqli_connect("localhost","root","","users");
  $qry="Create table users(id int auto_increment PRIMARY KEY,Name varchar(50),Email varchar(30),Password varchar(30),created_at timestamp default current_timestamp,Role varchar(30))";
  $create=mysqli_query($con,$qry);
  if($create){
      echo "Create table successflly.";
  }
?>