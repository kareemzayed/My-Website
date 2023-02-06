<?php
	session_start();
	require_once 'config.php';
	if(isset($_SESSION['user'])){
		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			$feedback = strip_tags($_POST['feedback']);
			$feedback = trim($feedback, " ");
			$feedback = trim($feedback, "-");
			$user_email = $_SESSION['user']['email'];
			$stm = $conn->prepare("SELECT * FROM user WHERE email = '$user_email'");
			$stm->execute();
			$data = $stm->fetch();
			$user_id = $data['id'];
			$user_name = $_SESSION['user']['name'];
			$date_now = date("Y/m/d");
			$stm = $conn->prepare("INSERT INTO user_feedbacks(user_id, user_name, feedback, history) VALUES('$user_id', '$user_name', '$feedback', '$date_now')");
			$stm->execute();
		}
	}
	else {
		header("location:Intro.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="imgs/fav.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Feedback | Kareem's Wibsite</title>
</head>
<body>
	<header id="navBar">
		<nav id="nav1">
			<ul>
				<li><a href="https://www.facebook.com/karym.zayd" target="_blank" id="facebookI"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://www.instagram.com/kareeem_zayed/" target="_blank" id="instagramI"><i class="fa fa-instagram"></i></a></li>
				<li><a href="https://www.linkedin.com/in/kareem-zayed-426071231/" target="_blank" id="linkedinI"><i class="fa fa-linkedin"></i></a></li>
				<li><a href="https://github.com/kareemzayed" target="_blank" id="githubI"><i class="fa fa-github"></i></a></li>
			</ul>
		</nav>
		<nav id="nav2">
			<a href="<?php echo $_SERVER['PHP_SELF']?>"><img src="imgs/logo.png" alt="LOGO"></a>
			<ul>
				<li><a href="<?php echo "Home.php"; ?>" id="Home">Home</a></li>
				<li><a href="<?php echo "feedback.php"; ?>" id="Comments"  style="color: #3a6cf4;">Feedback</a></li>
				<li><a href="#" id="Contact-us">Contact Me</a><i class="fa fa-angle-down"></i></li></li>
				<li><a href="<?php echo "personalInfo.php"; ?>" id="About">More Personal Information</a></li>
				<li><a href="<?php echo "logout.php"; ?>" id="Logout"><span>Log out</span></a></li>
			</ul>
			<i id="bars" class="fa menuefa fa-bars" onclick="showList()"></i>
			<i id="close" class="fa menuefa fa-times" onclick="hideList()"></i>
		</nav>
		<nav id="nav3">
			<ul>
				<div class="nav3Div">
					<li><a href="<?php echo "Home.php"; ?>" id="Home" style="color: #3a6cf4;">Home</a></li>
					<li><a href="<?php echo "feedback.php"; ?>" id="Comments">Feedback</a></li>
				</div>
				<div class="nav3Div">
					<li><a href="<?php echo "personalInfo.php"; ?>" id="About">More Personal Information</a></li>
					<li><a href="#" id="Contact-us">Contact Me</a><i class="fa fa-angle-down"></i></li></li>
				</div>
				<div class="nav3Div">
					<li><a href="<?php echo "logout.php"; ?>" id="Logout"><span>Log out</span></a></li>
				</div>
			</ul>
		</nav>
	</header>
	<section class="feed-section">
		<div class="feed-header">
			<h2>I hope you can give me feedback about your experience on my webpage</h2>
		</div>
		<div class="feed-added">
			<?php 
				if($_SERVER['REQUEST_METHOD'] === 'POST') {
					echo "<i class=\"fa fa-check\"></i> <p>Your feedback has been posted</p>";
				}
			?>
		</div>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="feed-input">
			<h2>Enter your feedback</h2>
			<textarea name="feedback" placeholder="Enter your feedback here...." required></textarea>
			<input type="submit" value="Post">
		</form>
		<div class="feed-output">
			<div class="feed-output-contant">
				<h2>Feedbacks</h2>
				<?php 
					$stm = $conn->prepare("SELECT user_name, feedback FROM user_feedbacks");
					$stm->execute();
					$feedbacks = $stm->fetchAll();
					if($feedbacks){
						foreach($feedbacks as $value) {
							echo "<div class=\"feed-post\">";
							echo "<h2>- " . $value['user_name'] . " -</h2>";
							echo "<textarea readonly>" . $value['feedback'] . "</textarea>";
							echo "</div>";
						}
					}
					else {
						echo "No Feedbacks Yet, Be The First One Give Me Feedback.";
					}
				?>
			</div>
		</div>
	</section>
	<script>
		var nav3 = document.getElementById("nav3");
		var bars = document.getElementById("bars");
		var close = document.getElementById("close");
		var prevScrollpos = window.pageYOffset;
		window.onscroll = function() {
			var currentScrollPos = window.pageYOffset;
			if (prevScrollpos > currentScrollPos) {
		    	document.getElementById("navBar").style.top = "0";
	     	} else {
				document.getElementById("navBar").style.top = "-400px";
			  }
			prevScrollpos = currentScrollPos;
		}
        function showList() {
            nav3.style.top = "78px";
            bars.style.display = "none";
            close.style.display = "block";
        }
        function hideList() {
            nav3.style.top = "-400px";
            bars.style.display = "block";
            close.style.display = "none";
        }
	</script>
</body>
</html>