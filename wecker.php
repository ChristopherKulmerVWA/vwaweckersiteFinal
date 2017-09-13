<?php
$hour = $_GET["hour"];
$mins = $_GET["mins"];

exec('echo "'.$mins.' '.$hour.' * * * mpc play "| crontab -');

?> 


<script>



function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=1) {
        location.href = 'index.php';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);

</script>

<!doctype html>
<html>
	<head>
		<title>Raspberry Pi Wecker 3.0</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		
		<!-- Slidebars CSS -->
		<link rel="stylesheet" href="slidebars/slidebars.css">
		
		<!-- Example Styles -->
		<link rel="stylesheet" href="style.css">
			<script src="js/jquery.js"></script>
<script src="js/fader.js"></script>

	</head>
	
	<body>	
		<div id="sb-site">
		

		<div id="header">
	<div class="headerleft">
	<div class="headerleftInner">	<img class="sb-toggle-left" style="width:25px;"src="slidebars/menu.png">
	</div>	</div>	
	<div class="headercontainer">
	<div class="headerlogoInner"></div>
	</div>
	<div style="float:right;margin-top:-4px;"><span style="font-size:25px;font-weight:600;padding-right:15px;"id="hours"></span></font></div>
	</div>

			<div id="content">
		<span style="font-size:25px;">Wecker wurde gestellt um: <?php echo $hour?>:<?php echo $mins?> Uhr.</span></br></br> Zurück zur Startseite in <span id="counter"> 10</span>
		<div class="sb-slidebar sb-left sb-style-push">
			<!-- Your left Slidebar content. -->



		</div>
	
				</div>	

		
		<!-- Slidebars -->
		<script src="slidebars/slidebars.min.js"></script>
		<script>
			(function($) {
				$(document).ready(function() {
					$.slidebars();
				});
			}) (jQuery);
		</script>

	</body>
</html>
