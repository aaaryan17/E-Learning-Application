<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,'LearnEd');

// Check connection


  $email = $_POST['email'];  
 $password = $_POST['Password'];  
      
        //to prevent from mysqli injection  
   
        
        $sql = "SELECT * from student where email = '$email' and Password = '$password'";  
        
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
       
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
            header("Location:user.php");
            exit();
        }  
        else{  
            echo "<h3><center>Invalid username or password </center></h3>";
        }   
$conn->close();  
?>
