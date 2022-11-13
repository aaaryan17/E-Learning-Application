<?php

//session_start();
$user_name = "root";
$password = "";
$database = "learned";
$host_name = "localhost";


$conn = mysqli_connect($host_name ,$user_name ,$password,$database);

/*$tName = $_POST['tname'];
$mail = $_POST['mail'];
$cName = $_POST['cname'];
$cDesc = $_POST['cdesc'];
$cLink = $_POST['clink'];
$tImage = $_POST['timage'];
$resume = $_POST['resume'];



$insertCourse = "INSERT INTO courses(creator,creator_mail,cname,cdescription,clink,timage,resume) VALUES (' $tName', '$mail', '$cName', '$cDesc', '$cLink', '$tImage','$resume')";*/
/*mysqli_query($conn, $insertCourse);
    header('location:user.html');
    echo(" Course created Successfully !");*/
//}


//$result = mysqli_query($conn, $insertCourse);  
//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
//$count = mysqli_num_rows($result);  

/*if($conn->query($insertCourse) === TRUE){  
    echo "<h1><center> Course created successfully! </center></h1>";  
    header("Location:user.html");
    exit();
}  
else{  
    echo "<h3><center>Course creation failed:( </center></h3>";
}   
$conn->close();  
?>

<?php

//session_start();
$user_name = "root";
$password = "";
$database = "LearnEd";
$host_name = "localhost";


$conn = mysqli_connect($host_name ,$user_name ,$password,$database);*/

$tName = $_POST['tname'];
$mail = $_POST['mail'];
$cName = $_POST['cname'];
$cDesc = $_POST['cdesc'];
$cLink = $_POST['clink'];
$file_timage=$_FILES['timage']['name'];
$file_timage_tmpname=$_FILES['timage']['tmp_name'];
$file_timage_size=$_FILES['timage']['size'];
$file_timage_type=$_FILES['timage']['type'];
//$file_timage_error=$_FILES['timage']['error']
//echo($file_timage."<br>".$file_timage_tmpname."<br>".$file_timage_size."<br>".$file_timage_type);
$file_resume=$_FILES['resume']['name'];
$file_resume_tmpname=$_FILES['resume']['tmp_name'];
$file_resume_size=$_FILES['resume']['size'];
$file_resume_type=$_FILES['resume']['type'];
//$file_resume_error=$_FILES['resume']['error'];
//echo($file_resume."<br>".$file_resume_tmpname."<br>".$file_resume_size."<br>".$file_resume_type);
$folder="teach_on/";
/* new file size in KB */
$new_timage_size=$file_timage_size/1024;
$new_resume_size=$file_resume_size/1024;

//Converts file name to Lower Case and replaces spaces with underscores
$new_file_timage=strtolower($file_timage);
$final_file_timage=str_replace(' ','_',$new_file_timage);
$final_timage_path = ($folder . $final_file_timage);

$new_file_resume=strtolower($file_resume);
$final_file_resume=str_replace(' ','_',$new_file_resume);
$final_resume_path = ($folder . $final_file_resume);
// print $final_flowchart_path; 
// print $final_swot_analysis_path;
//To Store the File Extension Type
$timage_fileExt=explode(".",$new_file_timage);
$timage_fileActualExt=end($timage_fileExt);
//echo("<br>".$timage_fileActualExt);
$resume_fileExt=explode(".",$new_file_resume);
$resume_fileActualExt=end($resume_fileExt);
//echo("<br>"."hello".$resume_fileActualExt);

$allowed= array('jpg','jpeg','png','pdf');
if(in_array($timage_fileActualExt,$allowed) && in_array($resume_fileActualExt,$allowed)){
            
    
    
            //To Check The File Size 
            if($new_flow_chart_size < 1000000 && $new_swot_analysis_size<1000000){
                
                //Uploads the File In the Folder
                move_uploaded_file($file_timage_tmpname,$folder.$final_file_timage); 
                move_uploaded_file($file_resume_tmpname,$folder.$final_file_resume) ;

                echo("<br>".$tName."<br>".$mail."<br>".$cName."<br>".$cDesc."<br>".$cLink."<br>".$final_file_timage."<br>".$new_timage_size."<br>".$final_timage_path."<br>".$final_file_resume."<br>".$new_resume_size."<br>".$final_resume_path."<br>");
               $insertCourse="INSERT INTO courses(creator,creator_mail,cname,cdescription,clink,timage_name,timage_file_size,timage_file_path,resume_name,resume_file_size,resume_file_path) VALUES 
               ('$tName','$mail','$cName','$cDesc','$cLink','$final_file_timage','$file_timage_size','$final_timage_path','$final_file_resume','$file_resume_size','$final_resume_path')";

                if ($conn->query($insertCourse) == true) {
                        echo "<h3><center>Course details Submitted! </center></h3><br><br><h5>Your course will be uploaded after verification. Thank you:)</h5>"; 
                        header("Location:user.php");
    exit(); 
                } 
                else{
                    echo "Course creation failed";
                }
            }
            else{
                echo "Your file size is too big ";
            }
    
    
}
else{
    echo "You cannot upload a file of this type";
}

?>