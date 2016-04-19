<?php session_start() ?>
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
						<li><a href="activities.php">Activities</a></li>
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
			<div id="pagetitle">Log In</div>
				<div id="content">
				<div class="form">
					<form action="login.php" method="post">
						<div class="formlabel"><b>netID</b></div><div class="forminput"><input class="formText" type="text" name="netId" placeholder="netID"></div>
						<div class="formlabel"><b>password</b></div><div class="forminput"><input class="formText" type="password" name="password" placeholder="password"></div>
						<div class="formsubmit">
						<input type="submit">
						</div>
					</form>
				</div>
				</div>
			</div>
		</div>
    </body>
</html>