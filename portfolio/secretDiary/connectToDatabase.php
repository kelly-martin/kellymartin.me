<?php

	$link = mysqli_connect("shareddb1e.hosting.stackcp.net", "secret-diary-users-3233682e", "Future@12", "secret-diary-users-3233682e");
		
	if ( mysqli_connect_error() ) {
		
		die("There was an error connecting to the database");
		
	}

?>