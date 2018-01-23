<?php

	// database info and credentials
	$servername = "localhost";
  $username = "kellymar_kelly";
  $password = "?NP#LZLQnWOa";
  $database = "kellymar_secretDiary";
	
	$link = mysqli_connect($servername, $username, $password, $database);
	if (mysqli_connect_error()) {
		die("There was an error connecting to the database");
	}

?>
