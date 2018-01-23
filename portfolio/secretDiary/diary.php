<?php

	// start the session
	session_start();

	// set session based on cookie, if it exists
	if (array_key_exists("id", $_COOKIE)) { $_SESSION['id'] = $_COOKIE['id']; }

	// check if session exists
	// if so, retrieve sessioned user's diary entry
	if ( array_key_exists("id", $_SESSION) && $_SESSION['id'] ) {
		// connect to database
		include("connectToDatabase.php");
		$query = "SELECT diary FROM users WHERE id = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";
		$row = mysqli_fetch_array(mysqli_query($link, $query));
		$diaryContent = $row['diary'];
	}
	// send user to login page if there is no session
	else { header("Location: login.php"); }

	if ( array_key_exists ('diary', $_POST) ) { echo $_POST['diary']; }

	// Contains the CSS style specs for the secret diary application
	include("header.html");

?>

	<nav class="navbar bg-faded navbar-fixed-top">
		<h1 class="navbar-brand logo">Secret Diary</h1>
		<div class="pull-xs-right">
			<a href ='login.php?logout=1'>
				<button class="btn btn-success" type="submit">Logout</button>
			</a>
		</div>
	</nav>

  <div class="container-fluid">
		<textarea id="diary" rows="30" class="form-control"><?php echo $diaryContent; ?></textarea>
  </div>

<?php

	// Contains the jQuery, JavaScript, and AJAX scripts for the secret diary application
	include("footer.html");

?>
