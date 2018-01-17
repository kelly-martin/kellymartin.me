<!DOCTYPE html>
<head>
  <title>CodePlayer</title>
	<link rel="stylesheet" href="../../packages/jquery-ui/jquery-ui.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" type="image/png" href="../../files/favicon.png" />
</head>

<body>

	<div id="header-container">
		<div id="logo">CodePlayer</div>
		<div id="button-container">
			<!-- HTML and Output buttons are toggled on by default !-->
			<div class="toggle-button active-button" id="html">HTML</div>
			<div class="toggle-button" id="css">CSS</div>
			<div class="toggle-button" id="js">JavaScript</div>
			<div class="toggle-button active-button" id="output">Output</div>
		</div>
	</div>

	<div id="body-container">
		<textarea class="panel" id="html-panel"><p id="paragraph">Hello World!</p></textarea>
		<textarea class="panel hidden" id="css-panel">p { color: green; }</textarea>
		<textarea class="panel hidden" id="js-panel">document.getElementById("paragraph").innerHTML = "Hello Kelly!";</textarea>
		<iframe class="panel" id="output-panel">jdfja;jf</iframe>
	</div>

</body>

    <script type="text/javascript" src="../../packages/jquery-3.2.1.min.js"></script>
		<script src="../../packages/jquery-ui/jquery-ui.js"></script>
		<script type="text/javascript">

			function updateOutput() {

				var outputHTML = "<html><head><style>" + $("#css-panel").val() + "</style></head><body>" + $("#html-panel").val() + "</body></html>";
				console.log(outputHTML);

				$("#output-panel").contents().find('html').html(outputHTML);

				document.getElementById("output-panel").contentWindow.eval($("#js-panel").val());

			}

			// Hover behavior for toggle buttons
			$(".toggle-button").hover(function() {

				// dark grey when mouse hovers
				$(this).addClass("highlighted-button");

			}, function() {

				// back to light grey when mouse leaves
				$(this).removeClass("highlighted-button");

			});

			// Click behavior for toggle buttons
			$(".toggle-button").on("click", function() {

				$(this).toggleClass("active-button");

				$(this).removeClass("highlighted-button");

				var panelId = $(this).attr("id") + "-panel";

                $("#" + panelId).toggleClass("hidden");

				var numActivePanels = 4 - $(".hidden").length;

				$(".panel").width($(window).width() / numActivePanels - 10);

			});

			$(".panel").height($(window).height() - $("#header-container").height() - 15);

			updateOutput();

            $("textarea").on('change keyup paste', function() {

                updateOutput();


            });



		</script>

</html>
