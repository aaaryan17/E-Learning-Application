<?php

session_start();
$user_name = "root";
$password = "";
$database = "test";
$host_name = "localhost";


$conn = mysqli_connect($host_name ,$user_name ,$password,$database);

$fName = $_POST['fname'];
$lName = $_POST['lname'];
$Email = $_POST['email'];
$Password = $_POST['password'];


$hashed_password = password_hash($password, PASSWORD_BCRYPT  );

$s = "select * from student where email='$Email'";

$result = mysqli_query($conn , $s);

$num = mysqli_num_rows($result);

if($num == 1)
{
    echo ("User already exists !");
}
else
{
    $signup = "INSERT INTO student_signup(name,clgname,univname,email,username,password,contact) VALUES (' $Name', '$Clgname', '$Univname', '$Email', '$Username', '$hased_password', '$Contact')";
    mysqli_query($conn, $signup);
    header('location:studentjoin.php');
   // echo(" Signedup Successfully !");
}


?>
