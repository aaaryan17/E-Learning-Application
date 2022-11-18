<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="images/icon/favicon.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>User</title>
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
		#view_courses {
			background-image: linear-gradient(to right, #FA4B37, #DF2771);
			width: 25%;
			height: 20%;
			font-size: 250%;
			padding: 3%;
			color: white;
			box-shadow: 5px 5px 12px #272529;
			font-weight: bold;
			font-family: cursive;
		}
	</style>
</head>
<body>
<!-- Navigation Bar -->
	<header id="header">
		<nav>
			<div class="logo"><img src="images/icon/logo.png" alt="logo"></div>
			<ul>
				<li><a class="active" href="index.php">Home</a></li>
				<li><a href="#popular_subjects">Popular subjects</a></li>
				<!--<li><a href="index.php#portfolio_section">Portfolio</a></li>
				<li><a href="#team_section">Team</a></li>
				<li><a href="#services_section">Services</a></li>
				<li><a href="#contactus_section">Contact</a></li>-->
				<li><a href="teach.html">Teach</a></li>
				<li><a href="all_courses.php">All courses</a></li>
			</ul>
			<!--<div class="srch"><input id="searchbar" type="text" name="valueToSearch" placeholder="Search here..."><img src="images/icon/search.png" alt="search" onclick=slide()></div>-->
			<a class="get-started" href="index.php">Logout</a>
			<img src="images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
		</nav>
		<div class="head-container">
			
			<a id="view_courses" href="all_courses.php">View Courses</a>
				
			<div class="svg-image">
				<img src="images/extra/svg1.jpg" alt="svg">
			</div>
		</div>
		<div class="side-menu" id="side-menu">
			<div class="close" onclick="sideMenu(1)"><img src="images/icon/close.png" alt=""></div>
			
			<ul>
				<li><a href="index.php#about_section">About</a></li>
				<li><a href="#portfolio_section">Portfolio</a></li>
				<li><a href="#team_section">Team</a></li>
				<li><a href="#services_section">Services</a></li>
				<li><a href="#contactus_section">Contact</a></li>
				<li><a href="teach.html">Teach</a></li>
				<li><a href="#feedBACK">Feedback</a></li>
			</ul>
		</div>
	</header>


<!-- Some Popular Subjects -->
	<div class="title" id="popular_subjects">
		<span>Popular Subjects on LearnEd</span>
	</div>
	<br><br>
	<div class="course">
		<center><div class="cbox">
		<div class="det"><a href="subjects/jee.html"><img src="images/courses/book.png">JEE Preparation</a></div>
		<div class="det"><a href="subjects/gate.html"><img src="images/courses/d1.png">GATE Preparation</a></div>
		<div class="det"><a href="subjects/jee.html#sample_papers"><img src="images/courses/paper.png">Sample Papers</a></div>
		<div class="det"><a href="subjects/quiz.html"><img src="images/courses/d1.png">Daily Quiz</a></div>
		</div></center>
		<div class="cbox">
		<div class="det"><a href="subjects/computer_courses.html"><img src="images/courses/computer.png">Computer Courses</a></div>
		<div class="det"><a href="subjects/computer_courses.html#data"><img src="images/courses/data.png">Data Structures</a></div>
		<div class="det"><a href="subjects/computer_courses.html#algo"><img src="images/courses/algo.png">Algorithm</a></div>
		<div class="det det-last"><a href="subjects/computer_courses.html#projects"><img src="images/courses/projects.png">Projects</a></div>
		</div>
	</div>

	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		session_start();
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
		
	
	</div>


	

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