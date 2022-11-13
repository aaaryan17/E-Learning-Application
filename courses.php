<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="images/icon/favicon.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>Courses</title>
	<meta name="desciption" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style01.css">
	<script type="text/javascript" src="script.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script>
		$(window).on('scroll', function(){
  			if($(window).scrollTop()){
  			  $('nav').addClass('black');
 			 }else {
 		   $('nav').removeClass('black');
 		 }
		})
	</script>

	<style type="text/css">
		#searchbar {
			border: none;
			width: 220%;
			height: 45px;
			margin-left: -245%;
			margin-top: 30%;
			border: 2px solid #DF2771;
			padding: 2%;
			padding-left: 10%;
			border-radius: 25px;
			font-size: 120%;
			margin-bottom: 10%;
			margin-right: -10%;
		}

		.srch {
			height: 40px;
			width: 50%;
			border: 2px solid yellow;
		}

		#title {
			text-align: center;
			/*border: 2px solid yellow;*/
			margin-top: -5%;
			margin-left: 40%;
			margin-bottom: 1.5%;

		}

		#content {
			margin-top: 5%;
		}

		table {
			margin-right: 10%;
			margin-left: 10%;
		}

		/*#search {
			border: 2px solid green;
			margin-left: -50%;
		}*/

		#filter_button {
			height: 50px;
			width: 50px;
			margin-top: 30%;
			margin-left: -25%;
			border: none;
			background-color: white;
		}

		#search_img {
			height: 35px;
			width: 35px;
			margin-top: -2%;
		}

		tr {
			width: 70%;
		}

		th, td {
			width: 15%;
			padding: 1.5%;
			/*border: 2px solid green;*/
		}

		th {
			text-align: left;
			background-image: linear-gradient(to right, #FA4B37, #DF2771);
		}

		td {
			background-color: #dddddd;
		}

		td:hover {
			background-color: #bbbbbb;
		}

		.head-container {
			margin-top: 5%;
		}

		#email_head {
			background-color: yellow;
		}

		.title {
			margin-top: 50%;
		}

		#verify_courses {
			width: 250px;
		    padding: 28px;
		    border-radius: 10px;
		    border: 2px solid #55AF55;
		    font-size: 15px;
		    color: #272529;
		    font-family: cursive;
		    margin-left: 42%;
		    box-shadow: 2px 2px 5px grey;
		}

		#verify_courses:hover {
			background-image: linear-gradient(to right, #FA4B37, #DF2771);
			box-shadow: 5px 5px 10px black;
			border: none;
		}

		#tick {
			height: 40px;
			width: 40px;
			padding-left: 2%;
		}

		marquee {

		}
	</style>
</head>
<body>

	<?php

		if(isset($_POST['search']))
		{
		    $valueToSearch = $_POST['valueToSearch'];
		    // search in all table columns
		    // using concat mysql function
		    $query = "SELECT * FROM `courses` WHERE cname LIKE '%".$valueToSearch."%'";
		    $search_result = filterTable($query);
		    
		}
		 else {
		    $query = "SELECT * FROM `courses`";
		    $search_result = filterTable($query);
		}

		// function to connect and execute the query
		function filterTable($query)
		{
		    $connect = mysqli_connect("localhost", "root", "", "learned");
		    $filter_Result = mysqli_query($connect, $query);
		    return $filter_Result;
		}

	?>


<!-- Navigation Bar -->
	<header id="header">
		<nav>
			<div class="logo"><img src="images/icon/logo.png" alt="logo"></div>
			<ul>
				<li><a class="active" href="index.php">Home</a></li>
				<li><a href="#popular_subjects">Popular subjects</a></li>
				<li><a href="teach.html">Add course</a></li>
				<li><a href="students.php">View Students</a></li>
			</ul>
			
			<a class="get-started" href="index.php">Logout</a>
			<img src="images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
		</nav>

		
		<div class="head-container">
			

			<h2 id="title" class="text-center pt-4" style="font-weight:bold; color:black;">Courses</h2><br>

				<form action="courses.php" method="post">
	            <input id="searchbar" type="text" name="valueToSearch" placeholder="Search Courses">
	            <button id="filter_button" type="submit" name="search" value="Filter"><img id="search_img" src="images/icon/search.png" alt="search" onclick=slide()></button></div><br><br>

	            <div><a id="verify_courses" href="verify_courses.php"><!--<img id="tick" src="images/courses/tick.jpg">-->Verify Courses</a></div><br><br><br><br><br>

				<div class="table">
					<table class="content-table" style="margin-bottom:auto;">
					<tbody>
						<thead>
							<tr>
								<th class="text-center">COURSE NAME</th>
								<th class="text-center">DESCRIPTION</th>
								<th class="text-center">LINK</th>
								<th class="text-center">CREATOR</th>
								<th class="text-center">VERIFIED</th>
								<!--<th class="text-center">THUMBNAIL</th>-->
								
							</tr>
						</thead>

						<?php while($rows = mysqli_fetch_array($search_result)):?>
							
								<tr>
									<td class="text-center py-2"><?php echo $rows['cname']; ?> </td>
									<td class="text-center py-2"><?php echo $rows['cdescription']; ?></td>
									<!--<td class="text-center py-2"><?php //echo $rows['clink']; ?></td>-->
									<?php echo "<td><a href='".$rows['clink']."'>Link to the course</a></td>"; ?>
									<td class="text-center py-2"><?php echo $rows['creator']; ?> </td>
									<td class="text-center py-2"><?php echo $rows['cname']; ?> </td>
									<!--<td class="text-center py-2"><?php /*header("Content-Type: image/jpeg");
									echo $rows['image'];*/ ?> </td>-->
								</tr>
									
								
						</tbody>
						<?php endwhile;?>
						</table>
					</form>

		</div>
		<div class="side-menu" id="side-menu">
			<div class="close" onclick="sideMenu(1)"><img src="images/icon/close.png" alt=""></div>
			
			<ul>
				<li><a href="#about_section">About</a></li>
				<li><a href="#portfolio_section">Portfolio</a></li>
				<li><a href="#team_section">Team</a></li>
				<li><a href="#services_section">Services</a></li>
				<li><a href="#contactus_section">Contact</a></li>
				<!--<li><a href="teach.html">Teach</a></li>-->
				<li><a href="#feedBACK">Feedback</a></li>
			</ul>
		</div>
	</header>


<!-- Some Popular Subjects -->
	<div class="title">
		<span>Popular Subjects on LearnEd</span>
	</div>
	<br><br>
	<div class="course">
		<center><div class="cbox">
		<div class="det"><a href="loginNew.html"><img src="images/courses/book.png">JEE Preparation</a></div>
		<div class="det"><a href="loginNew.html"><img src="images/courses/d1.png">GATE Preparation</a></div>
		<div class="det"><a href="loginNew.html"><img src="images/courses/paper.png">Sample Papers</a></div>
		<div class="det"><a href="loginNew.html"><img src="images/courses/d1.png">Daily Quiz</a></div>
		</div></center>
		<div class="cbox">
		<div class="det"><a href="loginNew.html"><img src="images/courses/computer.png">Computer Courses</a></div>
		<div class="det"><a href="loginNew.html"><img src="images/courses/data.png">Data Structures</a></div>
		<div class="det"><a href="loginNew.html"><img src="images/courses/algo.png">Algorithm</a></div>
		<div class="det det-last"><a href="loginNew.html"><img src="images/courses/projects.png">Projects</a></div>
		</div>
	</div>

	
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		//session_start();
		// Create connection
		$conn = mysqli_connect($servername, $username, $password,'learned');
		
		$sql = "SELECT cname FROM courses where verified='yes'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {?>
		<div class="cbox">
 		<?php while($row = $result->fetch_assoc()) { 
			 ?>
			
			<div class="det"><a href="subjects/trial.php"><img src="images/courses/book.png"><?php echo($row["cname"]);?></a></div>
  		<?php }?> </div>
		<?php 
		} else {
 		 echo "0 results";
		}
		?>
		
	

<!-- Sliding Information -->
	<marquee style="background: linear-gradient(to right, #FA4B37, #DF2771); margin-top: 50px;" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="20"><div class="marqu">“Education is the passport to the future, for tomorrow belongs to those who prepare for it today.” “Your attitude, not your aptitude, will determine your altitude.” “If you think education is expensive, try ignorance.” “The only person who is educated is the one who has learned how to learn …and change.”</div></marquee>

<!-- FOOTER -->
	<footer>
		<div class="footer-container">
			<div class="left-col">
				<img src="images/icon/logo - Copy.png" style="width: 200px;">
				<div class="logo"></div>
				<div class="social-media">
					<a href="#"><img src="images/icon\fb.png"></a>
					<a href="#"><img src="images/icon\insta.png"></a>
					<a href="#"><img src="images/icon\tt.png"></a>
					<a href="#"><img src="images/icon\ytube.png"></a>
					<a href="#"><img src="images/icon\linkedin.png"></a>
				</div><br><br>
				<p class="rights-text">Copyright © 2021 Created By Rincy Fernandes, Marilyn Almeida, Aryan Patil All Rights Reserved.</p>
				<br><p><img src="images/icon/location.png"> Lovely Professional University<br>Phagwara, Punjab-144401</p><br>
				<p><img src="images/icon/phone.png"> +91-1234-567-890<br><img src="images/icon/mail.png">&nbsp; learnedonline9419@gmail.com</p>
			</div>
			<div class="right-col">
				<h1 style="color: #fff">Our Newsletter</h1>
				<div class="border"></div><br>
				<p>Enter Your Email to get our News and updates.</p>
				<form class="newsletter-form">
					<input class="txtb" type="email" placeholder="Enter Your Email">
					<input class="btn" type="submit" value="Submit">
				</form>
			</div>
		</div>
	</footer>

</body>
</html>