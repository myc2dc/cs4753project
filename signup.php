<?php

    $db = new mysqli('localhost', 'root', '', 'cs4753');

    $firstNameErr = $lastNameErr = $emailErr = $addressErr = $cityErr = $stateErr = $zipCodeErr = "";
    $firstName = $lastName = $email = $address = $city = $state = $zipCode = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstName"])) {
    $firstNameErr = "* First name is required";
  } else {
    $firstName = test_input($_POST["firstName"]);
    // check if first name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$firstName) || (trim($firstName) == '')) {
      $firstNameErr = "* Invalid format. Please use only letters.";
    }
  }

  if (empty($_POST["lastName"])) {
    $lastNameErr = "* Last name is required";
  } else {
    $lastName = test_input($_POST["lastName"]);
    // check if last name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$lastName) || (trim($lastName) == '')) {
      $lastNameErr = "* Invalid format. Please use only letters.";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "* Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "* Invalid email format. Please input your email in the following format: example@gmail.com";
    }
  }

  if (empty($_POST["address"])) {
    $addressErr = "* Address is required";
  } else {
    $address = test_input($_POST["address"]);
    // check if address is well-formed
    if (!preg_match("/^([0-9]+ )(([a-zA-Z])+( )?)+(([.#])?( )?[0-9]+?)?$/",$address)) {
      $addressErr = "* Invalid address format. Please enter the house number and then the street information.";
    }
  }

  if (empty($_POST["city"])) {
    $cityErr = "* City is required";
  } else {
    $city = test_input($_POST["city"]);
    // check if city is well-formed
    if (!preg_match("/^[a-zA-Z]*$/",$city) || (trim($city) == '')) {
      $cityErr = "* Invalid city format. Please use only letters.";
    }
  }

  if (empty($_POST["state"])) {
    $stateErr = "* State is required";
  } else {
    $state = test_input($_POST["state"]);
    // check if state is well-formed
    if (!preg_match("/\b([a-zA-Z]{2})\b$/",$state)) {
      $stateErr = "* Invalid state format. Please enter the state abbreviation.";
    }
  }

  if (empty($_POST["zipCode"])) {
    $zipCodeErr = "* Zip Code is required";
  } else {
    $zipCode = test_input($_POST["zipCode"]);
    // check if zip code is well-formed
    if (!preg_match("/^[0-9]{5}$/",$zipCode)) {
      $zipCodeErr = "* Invalid zip code format. Please enter only five digits.";
    }
  }

  if ($zipCodeErr == "" && $stateErr == "" && $cityErr == "" && $addressErr == "" && $emailErr == "" && $lastNameErr == "" && $firstNameErr == "") {

       	$query = "INSERT INTO siteUsers VALUES('userNum', '$firstName', '$lastName', '$email', '$address', '$city', '$state', '$zipCode')";
       	$db->query($query) or die ("Invalid insert " . $db->error);

		echo '<script language="javascript">';
		echo 'alert("You have successfully signed up!")';
		echo '</script>';
		unset($_POST);
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
						<h2><strong>SIGN UP</strong></h2>
					</header>

					<!-- One -->
						<section class="wrapper style4 container">

							<!-- Content -->
								<div class="content">
									<section>
										<form action="signup.php" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  											First Name: 
											<input type="text" name="firstName" placeholder="Chandler"><?php echo $firstNameErr;?></span><br><br>
											Last name:
											<input type="text" name="lastName" placeholder="Bing"> <?php echo $lastNameErr;?></span><br><br>
											Email:
											<input type="text" name="email" placeholder="chander.bing@gmail.com"><?php echo $emailErr;?></span><br><br>
											Address: 
											<input type="text" name="address" placeholder="1234 Happy Lane Apt. 506"><?php echo $addressErr;?></span><br><br>
											City: 
											<input type="text" name="city" placeholder="Fairfax"><?php echo $cityErr;?></span><br><br>
											State:
											<input type="text" name="state" placeholder="VA"><?php echo $stateErr;?></span><br><br>
											Zip Code:
											<input type="text" name="zipCode" placeholder="22030"><?php echo $zipCodeErr;?></span><br><br>
											<center><input type="submit" class="button special" name="submit" value="Sign Up"></center>
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

