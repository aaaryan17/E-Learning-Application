<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection

$conn = mysqli_connect($servername, $username, $password,'LearnEd');

// Check connection

$fname = $_POST['fullname'];
$email =$_POST['email'];
$password2=$_POST['Password'];
$rpassword=$_POST['RPassword'];

if($password2!=$rpassword){
    echo "<center> Please Check Password </centre>";
}
else{
    
    $sql = "INSERT INTO student(fullname,email,password) VALUES ('$fname','$email','$rpassword')";
if ($conn->query($sql) === TRUE) {
    header("Location:loginNew.html");
    exit(); 
  } 
}
  $conn->close();
?>