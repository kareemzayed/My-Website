<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="imgs/fav.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Personal Information | Kareem's Wibsite</title>
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
                <li><a href="<?php echo "feedback.php"; ?>" id="Comments">Feedback</a></li>
                <li><a href="#" id="Contact-us">Contact Me</a><i class="fa fa-angle-down"></i></li></li>
                <li><a href="<?php echo "presonalInfo.php.php"; ?>" id="About"  style="color: #3a6cf4;">More Personal Information</a></li>
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
                    <li><a href="<?php echo "presonalInfo.php.php"; ?>" id="About">More Personal Information</a></li>
                    <li><a href="#" id="Contact-us">Contact Me</a><i class="fa fa-angle-down"></i></li></li>
                </div>
                <div class="nav3Div">
                    <li><a href="<?php echo "logout.php"; ?>" id="Logout"><span>Log out</span></a></li>
                </div>
            </ul>
        </nav>
    </header>
    <section class="personalInfo">
        <div class="content">
            <div class="text">
                <h2>Welcome Again,</h2>
                <p>I'm Kareem Zayed Abdul Kirem.<br>
                Student at the Faculty of Computers and Information Science, Ain Shams University.<br>
                Undergraduate, in the fourth year.<br>
                My GPA is B. <br>
                At the age of 21.<br>
                My hobbies are solving problems and various sports such as bodybuilding, football and others.<br>
            </p>
            <div class="cv">
                <h2>You Can Find My CV Here</h2>
                <a href="https://drive.google.com/file/d/1Wni2eDDKSQido3HT9NVPr6v4OnfbYt2F/view?usp=sharing" target="_blank">My CV</a>
            </div>
            </div>
        </div>
        <div class="img">
            <img src="imgs/my.png" alt="My Photo">
        </div>
    </section>
</body>