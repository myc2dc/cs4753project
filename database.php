<?php

$db = new mysqli('localhost', 'root', 'password', 'cs4753');

$result = $db->query("CREATE TABLE siteUsers (
	userNum INT PRIMARY KEY AUTO_INCREMENT, 
	firstName char(100) NOT NULL, 
	lastName char(100) NOT NULL,
	email char(100) NOT NULL,
	address char(100) NOT NULL,
	city char(50) NOT NULL,
	state char(2) NOT NULL,
	zipcode char(5) NOT NULL, 
	)") or die ("Invalid: " . $db->error);
echo "Table of Quizzes has been created." . "<br/>";
?> 