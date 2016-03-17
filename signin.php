<html>
    <head>
		<link rel="stylesheet" href="index.css"></style>
		<title>Sign into ARC</title>
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
						<?php if (array_key_exists('username', $_SESSION)): ?>
							<li><a href="logout.php">Log Out</a></li>
							<li>Logged in as <?php echo $_SESSION['username']; ?></li>
						<?php else: ?>
							<li><a href="signin.php">Log In</a></li>
							<li><a href="signup.php">Join</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div id="body">
			<div id="pagetitle">Log In</div>
				<div id="content">
					<form action="login.php" method="post">
						<input class="bigText" type="text" name="netId" placeholder="netID"><br/>
						<input class="bigText" type="password" name="password" placeholder="password"><br/>
						<br><input type="submit">
					</form>
				</div>
			</div>
		</div>
    </body>
</html>