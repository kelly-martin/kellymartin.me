</body>

	<script src="../../packages/jquery-3.2.1.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

	<script src="../../packages/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">

		// controls the behavior for toggling between signing up or logging in
		$(".toggleForms").click(function() {
    	$("#signUpForm").toggle();
      $("#logInForm").toggle();
  	});

		// update database when user types in diary
		$('#diary').bind('input propertychange', function() {

			// since a PHP script will be run to update the database, we need to use AJAX to trigger the script off user input
			$.ajax({
				method: "POST",
				url: "updateDatabase.php",
				data: { content: $('#diary').val() }
			});

		});

		// JavaScript form validation, make sure all the required fields are filled in
		$("form").submit(function (e) {
			var errorMessage = "";
			if ($("#email").val() == "") { errorMessage += "An email is required.<br>"; }
			if ($("#password").val() == "") { errorMessage += "A password is required.<br>"; }

			if (errorMessage != "") {
				$("#alert").html("<div class='alert alert-danger'><strong>There were error(s) in your form:</strong><br>" + errorMessage + "</div>");
				return false;
			} else { return true; }
		});

	</script>
