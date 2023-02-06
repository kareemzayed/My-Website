<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		session_start();
		require_once 'config.php';

		if(isset($_POST['signup'])) {
			$name = strip_tags($_POST['name']);
			$name = trim($name, " ");
			$name = trim($name, "-");
			$pass = strip_tags($_POST['password']);
			$rpass = strip_tags($_POST['repassword']);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			$errors = [];
			// validate name
			if(empty($name))
				$errors[] = "Please Enter Name";
			if(strlen($name) > 255)
				$errors[] = "Please, Name lenght must not be more than 255 letters !";
			// validate email
			if(empty($email))
				$errors[] = "Please Enter E-Mail";
			elseif(strlen($email) > 255)
				$errors[] = "Please, E-Mail lenght must not be more than 255 letters !";
			elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
				$errors[] = "Please Enter Valid Email !";
			$stm = $conn->prepare("SELECT * FROM user WHERE email = '$email'");
			$stm->execute();
			$data = $stm->fetch();
			if($data)
				$errors[] = "This email is already token !";
			//validate passord
			if(empty($pass))
				$errors[] = "Please Enter password";
			if(empty($rpass))
				$errors[] = "Please Enter Confirm password";
			if($pass !== $rpass)
				$errors[] = "The two password dos'nt match !";
			elseif(strlen($pass) < 6)
				$errors[] = "password must be more than 6 letters !";
			 //insert into db
			if(empty($errors)){
				$pass = password_hash($pass, PASSWORD_DEFAULT);
				$stm = $conn->prepare("INSERT INTO user(name, email, password) VALUES('$name', '$email', '$pass')");
				$stm->execute();
				$_SESSION['user'] = [
					'name' => $name,
					'email' => $email,
				];
				header("location:Home.php");
				exit;
			}

		}
		elseif (isset($_POST['login'])){
			$pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			//valid email
			if(empty($email)) {
				$errors[] = "Please Enter E-Mail";
			}
			elseif(strlen($email) > 255) {
				$errors[] = "Please, E-Mail lenght must not be more than 255 letters !";
			}
			elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errors[] = "Please Enter Valid Email !";
			}
			//valid password
			if(empty($pass)){
				$errors[] = "Please Enter password";
			}
			if(empty($errors)) {
				$stm = $conn->prepare("SELECT * FROM user WHERE email = '$email'");
				$stm->execute();
				$data = $stm->fetch();
				if(!$data) {
					$errors[] = "Wrong email !";
				}
				else {
					if(password_verify($pass, $data['password'])){
						$_SESSION['user'] = [
							'name' => $data['name'],
							'email' => $email,
						];
						header("location:Home.php");
						exit;
					}
					else{
						$errors[] = "Wrong Password !";
					}
				}
			}
		}
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
	<title>Introduction | Kareem's Wibsite</title>
</head>
<body>
	<header id="navBar">
		<nav id="nav2">
			<a href="<?php echo $_SERVER['PHP_SELF']?>"><img src="imgs/logo.png" alt="LOGO"></a>
		</nav>
	</header>

	<section class="main">
		<div>
			<h2>Hello in my website<br><span>Full Stack PHP Develober</span></h2>
			<h3>For more informations and give me feedback,<br>Please sign up or log in if you already have account.</h3>
			<div class="btn-main">
				<a href="#sign" class="btn main-btn2">Log in or sign up</a>
			</div>
		</div>
	</section>

	<section id="sign">
		<div class="sign-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()">Log In</button>
				<button type="button" class="toggle-btn" onclick="signup()">Sign Up</button>
			</div>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id= "login-form" class="input-group">
				<div class="errors">
					<?php
						if(isset($errors)) {
							echo "<ul>";
							foreach ($errors as $value) {
								echo "<li>" . $value . "</li>" . "<br />";
							}
							echo "</ul>";
						}
					?>
				</div>
				<input type="email" name="email" class="input-field" placeholder="E-Mail" required>
				<input type="password" name="password" class="input-field" placeholder="Password" required>
				<input type="checkbox" id="remember-pass" name="remember-pass" class="check-box"><label for="remember-pass">Remember Password</label>
				<button type="submit" class="submit-btn" name="login">Log In</button>
			</form>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id= "signup-form" class="input-group">
				<div class="errors">
					<?php
						if(isset($errors)) {
							echo "<ul>";
							foreach ($errors as $value) {
								echo "<li>" . $value . "</li>" . "<br />";
							}
							echo "</ul>";
						}
					?>
				</div>
				<input type="text" name="name" class="input-field" placeholder="Your Name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" required>
				<input type="email" name="email" class="input-field" placeholder="E-Mail" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required>
				<input type="password" name="password" class="input-field" placeholder="Password" required>
				<input type="password" name="repassword" class="input-field" placeholder="Confirm Password" required>
				<button type="submit" class="submit-btn" name="signup">Sign Up</button>
			</form>
		</div>
	</section>
	<script>
		var x = document.getElementById("login-form");
		var y = document.getElementById("signup-form");
		var z = document.getElementById("btn");
		function signup() {
			x.style.left = "-400px";
			y.style.left = "50px";
			z.style.left = "110px";
		}
		function login() {
			x.style.left = "50px";
			y.style.left = "450px";
			z.style.left = "0";
		}
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
	</script>
</body>
</html>