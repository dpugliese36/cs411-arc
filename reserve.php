<html>
    <head>
		<link rel="stylesheet" href="index.css"></style>
		<title>Make Reservation</title>
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
			<div id="pagetitle">Make Your Reservation!</div>
				<div id="content">
					<form action="reservations.php" method="post">
						<input class="bigText" type="date" name="start" placeholder="Start Time (YYYY-MM-DD)"><br/>
						<input class="bigText" type="date" name="end" placeholder="End Time (YYYY-MM-DD)"><br/>
						<select class="bigText" name="roomID">
							<option value="ARC205">ARC205 - All Purpose Room</option>
							<option value="ARC214">ARC214 - All Purpose Room</option>
							<option value="ARC235">ARC235 - Gymnasium</option>
							<option value="ARC178">ARC178 - Rock Climbing</option>
							<option value="ARC136">ARC136 - Kitchen</option>
						</select>
						<br><input type="submit">
					</form>
				</div>
			</div>
		</div>
    </body>
</html>