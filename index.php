<?php session_start(); ?>
<html>
	<head>
		<link rel="stylesheet" href="index.css"></style>
		<title>ARC Recreation Coordinator</title>
	</head>
	<body>
		<div id="main">
			<div id="top">
				<img id="headerimage" src="Header.png"><img>
				<img src="Logo.png"></img>
				<div id="header">
					<ul id="navigation">
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="index.php">Activities</a></li>
						<li><a href="reserve.php">Reservations</a></li>
					</ul>
					<ul id="account">
						<?php if (array_key_exists('netId', $_SESSION)): ?>
							<li><a href="logout.php">Log Out</a></li>
							<li>Logged in as <?php echo $_SESSION['netId']; ?></li>
						<?php else: ?>
							<li><a href="signin.php">Log In</a></li>
							<li><a href="signup.php">Join</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div id="body">
			<div id="pagetitle">Home Page</div>
			<div id="content">
				<b>Welcome to the ARC Recreation Coordinator, or ARC for short.</b><br>
				
				Enjoy the finest of placeholder text:<br><br>
				
				Today's weather will be a high of 66 degrees Fahrenheit and a low of 52. Cloudy. 35% chance of rain. Winds NNE 20 MPH. Tomorrow's forecast will be 35 degrees Fahrenheit and a low of 23. Snow. Winds ENE 25 MPH.
			</div>
			</div>
		</div>
  	</body>
</html>