<?php 
	session_start();
	if(isset($_SESSION['user'])) {
		$user_name = $_SESSION['user']['name'];
		$user_email = $_SESSION['user']['email'];
	}
	else{
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
	<title>Home | Kareem's Wibsite</title>
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
				<li><a href="<?php echo "Home.php"; ?>" id="Home" style="color: #3a6cf4;">Home</a></li>
				<li><a href="<?php echo "feedback.php"; ?>" id="Comments">Feedback</a></li>
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
	<section class="main">
		<div>
			<h2>Hello <?php echo " " . $user_name; ?>, I'm Kareem<br><span>Full Stack PHP Develober</span></h2>
			<h3>I design websites using PHP, MySQL and Laravel framework</h3>
			<div class="btn-main">
				<a href="#projects" class="btn main-btn1">Courses</a>
				<a href="#Certificats" class="btn main-btn2">Certificates</a>
			</div>
		</div>
	</section>
	<section class="cards" id="services">
		<h2 class="title">Services</h2>
		<div class="content">
			<div class="card">
				<div class="icon">
					<i class="fa fa-code"></i>
				</div>
				<div class="info">
					<h3>Front end development</h3>
					<p>By using HTML/CSS/Javascript, I can Develop your website.</p>
				</div>
			</div>
			<div class="content">
			<div class="card">
				<div class="icon">
					<i class="fa fa-database"></i>
				</div>
				<div class="info">
					<h3>Backend development</h3>
					<p>I use PHP language and MySQL & PDO datbase to develop your website.</p>
				</div>
			</div>
			<div class="content">
			<div class="card">
				<div class="icon">
					<i class="fa fa-codepen"></i>
				</div>
				<div class="info">
					<h3>Laravel development</h3>
					<p>Using Laravel framwork to develop websites.</p>
				</div>
			</div>
		</div>
	</section>
	<section id="Certificats" class="certificate">
		<h3 class="title">Certificates</h3>
		<div class="content">
			<div class="box" style="--clr: #89ec5b;">
				<div class="certificate-content">
					<div class="img"><img src="imgs/udemy.png"></div>
					<div class="txt">
						<h3>Powered by Udemy</h3>
						<p>Web Development Course With PHP, PDO & MySQL</p>
						<a href="https://www.udemy.com/certificate/UC-7460b649-97a0-4c14-b44e-46daff8d0fe3/" target="_blank">More Details</a>
					</div>
				</div>
			</div>
			<div class="box" style="--clr: #eb5ae5;">
				<div class="certificate-content">
					<div class="img"><img src="imgs/iti.png"></div>
					<div class="txt">
						<h3>Powered by ITI Platform</h3>
						<p>Building Web Applications Using PHP & MySQL</p>
						<a href="https://maharatech.gov.eg/mod/customcert/verify_certificate.php?contextid=36489&code=HF8DAVBrLJ&qrcode=1" target="_blank">More Details</a>
					</div>
				</div>
			</div>
			<div class="box" style="--clr: #5b98eb;">
				<div class="certificate-content">
					<div class="img"><img src="imgs/egfwd.png"></div>
					<div class="txt">
						<h3>Powered by Udacity & itida</h3>
						<p>Web Development Challenger Track</p>
						<a href="https://drive.google.com/file/d/1Z3WS33MMFjAc5LeUmL6vydjBk5FYtAZ7/view" target="_blank">More Details</a>
					</div>
				</div>
			</div>
			<div class="box" style="--clr: #89ec5b;">
				<div class="certificate-content">
					<div class="img"><img src="imgs/sublimeudemy.png"></div>
					<div class="txt">
						<h3>Powered by Udemy</h3>
						<p>Sublime Text 3 Basics Guide 2022</p>
						<a href="https://www.udemy.com/certificate/UC-e13a1b66-d833-443b-9219-2cd0d45b5aa8/" target="_blank">More Details</a>
					</div>
				</div>
			</div>
			<div class="box" style="--clr: #eb5ae5;">
				<div class="certificate-content">
					<div class="img"><img src="imgs/HSBC.png"></div>
					<div class="txt">
						<h3>Powered by HSBC</h3>
						<p>Summer Training In HSBC Bank</p>
						<a href="https://drive.google.com/file/d/1lvdEylZcHao34LdyEECddAufpLxMw2Tp/view" target="_blank">More Details</a>
					</div>
				</div>
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