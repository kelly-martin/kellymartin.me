<?php

	// start the session
	session_start();
	
	if (array_key_exists("content", $_POST)) {
		
		// connect to database
		include("connectToDatabase.php");
        
		// query to update diary for sessioned user in database
        $query = "UPDATE `users` SET `diary` = '".mysqli_real_escape_string($link, $_POST['content'])."' WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
        
		// run query 
        mysqli_query($link, $query);
		
	}

?>