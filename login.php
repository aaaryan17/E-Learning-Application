<?php

session_start();
$user_name = "root";
$password = "";
$database = "test";
$host_name = "localhost";


$conn = mysqli_connect($host_name ,$user_name ,$password,$database);

$username = $_POST['username'];
$password = $_POST['password'];

echo $username;
echo $password;

$query = " select * from college_signup where username = '$username' && Password = '$password' && login_flag != 1";

$result = mysqli_query($conn, $query);

$num = mysqli_num_rows($result);

$_SESSION['userName'] = $username; //do checks on the post data!
$_SESSION['userPass'] = $password; //do checks on the post data!

$_SESSION['dbConn'] = $conn;


if($num == 1)
{

    $ss = "UPDATE college_signup SET login_flag = 1 where username = '$username' && password = '$password'";
    $result_ss = mysqli_query($conn, $ss);

     header('Location:college_view.php');//connect event.php here
    //header('location:Menu.html');

    //console_log($result);	  
}
else
{
    //header('location:Login.php');
    echo("TRY AGAIN");
}
	  
?>