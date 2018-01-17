<?php

// left to do:
// adding diary text to diary column of users table in real time (use session email variable to determine where to insert in table)\

	// start the session
	session_start();

	$email = "";
	$password = "";
	$errorMessage = "";
	$signupOrLogin = "";

	if ( array_key_exists("logout", $_GET)) {
		// free the session variable
		unset($_SESSION);
		// get rid of cookie
		setcookie("id", "", time() - 60*60);
		$_COOKIE["id"] = "";
		// delete all session data
		session_destroy();
	}
	else if ( (array_key_exists("id", $_SESSION) && $_SESSION['id']) || (array_key_exists("id", $_COOKIE) && $_COOKIE['id']) ) {
		// if there is an existing session or cookie, redirect them to the diary entry page
		header("Location: index.php");
	}

	// only do all this stuff if they have pressed the submit button
	if ($_POST) {

		// connect to database
		include("connectToDatabase.php");

		// Check for required fields (email, password)
		// Set error message if anything is missing
		// Else, set variables
		if ( !empty($_POST['email']) )
			 { $email = $_POST['email']; }
		else { $errorMessage .= "An email is required.<br>"; }

		if ( !empty($_POST['password']) )
			 { $password = $_POST['password']; }
		else { $errorMessage .= "A password is required.<br>"; }

		// display error message if anything is missing
		if ($errorMessage) {
			$errorMessage = "<div class='alert alert-danger'><strong>There were error(s) in your form:</strong><br>".$errorMessage."</div>";
		}
		// Proceed if they have filled in all required fields in the form
		else {
			// get the value of the submit button they clicked (either "Sign Up!" or "Log In!")
			if ( !empty($_POST['submit']) ) { $signupOrLogin = $_POST['submit']; }

			// hash password
			$hash = password_hash($password, PASSWORD_DEFAULT);

			// if they are registering (clicked the "Sign Up!" button), we must check that the email address is not already registered
			if ($signupOrLogin == "Sign Up!") {
				$alreadyRegisteredQuery = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link, $email)."'";
				$result = mysqli_query($link, $alreadyRegisteredQuery);

				// set error message if email is already registered
				if (mysqli_num_rows($result) > 0) {
					$errorMessage = "<div class='alert alert-danger'>This email address is already registered. Please log in with your password or try another email address.</div>";
				}
				// proceed with registration process is email is not already registered
				else {
					// add user to datatbase with hashed password
					$registerUserQuery = "INSERT INTO users (`email`, `password`) VALUES('".mysqli_real_escape_string($link, $email)."','".mysqli_real_escape_string($link, $hash)."')";

					// upon successfully adding them to database
					if (mysqli_query($link, $registerUserQuery)) {
							// store their id as the session variable
							$_SESSION['id'] = mysqli_insert_id($link);
							// check if user selected to stay logged in
							if ( $_POST['stayLoggedIn'] == "1" ) {
								// create a cookie that lasts 'forever'
								setcookie("id", mysqli_insert_id($link), time() + 60 * 60 * 24 * 365 * 10);
							}
							// redirect them to the diary entry page
							header("Location: index.php");
					}
					else {
						$errorMessage = "<div class='alert alert-danger'>There was an error in registering your account. Please try again later.</div>";
					}

				}

			}

			else {
				// if they are logging in, must retrieve password from DB based on email entered and compare that to the hash of the password retrieved
				$getPasswordQuery = "SELECT * FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $email)."'";
				// run query
				$getPasswordResult = mysqli_query($link, $getPasswordQuery);

				// check if there is a result
				if ( mysqli_num_rows($getPasswordResult) < 1 ) {
					// if not, error that this email does not exist
					$errorMessage = "<div class='alert alert-danger'>That email/password combination could not be found.</div>";
				}

				// if so, proceed with password verification and login
				else {
					// fetch the array resulting from the query
					$getPasswordResultRow = mysqli_fetch_array($getPasswordResult);
					// get the password from the result array
					$passwordFromDB = $getPasswordResultRow['password'];
					// verify the password retrieved from the database with the password entered in the form (not hashed)
					if (password_verify($password, $passwordFromDB)) {
						// upon successfully verifying their password
						// store their id as the session variable
						$_SESSION['id'] = $getPasswordResultRow['id'];
						// check if user selected to stay logged in
						if ( $_POST['stayLoggedIn'] == "1" ) {
							// create a cookie that lasts 'forever'
							setcookie("id", $getPasswordResultRow['id'], time() + 60 * 60 * 24 * 365 * 10);
						}
						// redirect them to the diary entry page
						header("Location: index.php");
					}
					// display error if password_verify() fails
					else {
						$errorMessage = "<div class='alert alert-danger'>That email/password combination could not be found.</div>";
					}

				}

			}

		}

	}

	// Contains the CSS style specs for the secret diary application
	include("header.html");

?>

	<div class="container" id="loginPageContainer">
		<h1>Secret Diary</h1>
		<p><strong>Store your thoughts permanently and securely.</strong></p>

		<div id="alert">
			<?php echo $errorMessage; ?>
		</div>

		<form method="post" id="signUpForm">

			<p>Interested? Sign up now.</p>

			<input id="email" type="email" name="email" placeholder="Your Email" class="form-control form-spacing">

			<input id="password" type="password" name="password" placeholder="Password" class="form-control form-spacing">

			<input class="form-spacing" type="checkbox" name="stayLoggedIn" value="1"> Stay logged in<br>

			<input type="hidden" name="signUp" value="1">

			<input id="signup_submit" name="submit" type="submit" class="form-spacing btn btn-success" value="Sign Up!">

			<p class="form-spacing"><a class="toggleForms">Log in</a></p>

		</form>

		<form method="post" id="logInForm">

			<p>Log in with your username and password.</p>

			<input id="email" type="email" name="email" placeholder="Your Email" class="form-control form-spacing">

			<input id="password" type="password" name="password" placeholder="Password" class="form-control form-spacing">

			<input class="form-spacing" type="checkbox" name="stayLoggedIn" value="1"> Stay logged in<br>

			<input type="hidden" name="signUp" value="0">

			<input id="login_submit" name="submit" type="submit" class="form-spacing btn btn-success" value="Log In!">

			<p class="form-spacing"><a class="toggleForms">Sign up</a></p>

		</form>

	</div>


<?php

	// Contains the jQuery, JavaScript, and AJAX scripts for the secret diary application
	include("scripts.php");

?>
