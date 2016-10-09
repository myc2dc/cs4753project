<?php

	$db = new mysqli('localhost', 'root', 'password', 'cs4753');

	if (isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['zipcode'])) {
	  	$firstName = $_POST["firstname"];
	  	$lastName = $_POST["lastname"];
	  	$email = $_POST["email"];
	  	$address = $_POST["address"];
	  	$city = $_POST["city"];
	  	$state = $_POST["state"];
	  	$zipcode = $_POST["zipcode"];
	  	
	  	//escape everything
	  	$firstName = mysql_real_escape_string(trim($firstName));
       	$lastName = mysql_real_escape_string(trim($lastName));
       	$email = mysql_real_escape_string(trim($email));
       	$address = mysql_real_escape_string(trim($address));
       	$city = mysql_real_escape_string(trim($city));
       	$state = mysql_real_escape_string(trim($state));
       	$zipcode = mysql_real_escape_string(trim($zipcode));

       	$query = "INSERT INTO siteUsers VALUES('userNum', '$firstName', '$lastName', '$email', '$address', '$city', '$state', '$zipcode')";
       	$db->query($query) or die ("Invalid insert " . $db->error);

       	echo '<script language="javascript">';
		echo 'alert("You have successfully signed up!")';
		echo '</script>';
    }
?>

<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>About Us</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="left-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.html">Kolore</a></h1>
					<nav id="nav">
						<ul>
							<li class="current"><a href="index.html">Home</a></li>
							<li class="current"><a href="aboutus.html">About Us</a></li>
							<li><a href="signup.php" class="button special">Sign Up</a></li>
						</ul>
					</nav>
				</header>


			<!-- Main -->
				<article id="main">

					<header class="special container">
						<span class="icon fa-mobile"></span>
						<h2><strong>SIGN UP HERE</strong></h2>
					</header>

					<!-- One -->
						<section class="wrapper style4 container">

							<!-- Content -->
								<div class="content">
									<section>
										<form action="signup.php" method="post">
  											First Name: 
											<input type="text" name="firstname">
											Last name:
											<input type="text" name="lastname">
											Email:
											<input type="text" name="email">
											Address: 
											<input type="text" name="address">
											City: 
											<input type="text" name="city">
											State:
											<input type="text" name="state">
											ZipCode: 
											<input type="text" name="zipcode">
											<input type="submit" class="button special" value="Sign Up">
										</form>
									</section>
								</div>

						</section>

				</article>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>

