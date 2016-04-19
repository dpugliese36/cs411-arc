<?php session_start(); ?>
<html>
	<head>
		<link rel="stylesheet" href="index.css"></style>
		<title>About ARC</title>
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
							<li><a href="viewAccount.php"><?php echo $_SESSION['netId']; ?></a></li>
						<?php else: ?>
							<li><a href="signin.php">Log In</a></li>
							<li><a href="signup.php">Join</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div id="body">
			<div id="pagetitle">About ARC</div>
			<div id="content">
				ARC, not to be confused with the ARC (Activities and Recreation Center), stands for ARC Recreation Coordinator. It is a web-based service where students, RSOs and faculty can reserve rooms, plan workouts and learn about the facilities of the recreation centers of UIUC, CRCE and ARC.<br><br>
				ARC was created by Douglas Zhu, Matthew Yang, Daniel Pugliese and Chufeng Yuan.
			</div>
			</div>
		</div>
  	</body>
</html>