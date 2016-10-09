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

       	

	}

	


?>