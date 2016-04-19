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
							<li><a href="viewAccount.php"><?php echo $_SESSION['netId']; ?></a></li>
						<?php else: ?>
							<li><a href="signin.php">Log In</a></li>
							<li><a href="signup.php">Join</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div id="body">
				<div id="pagetitle">My Account</div>
				<div id="content">
					<div class="form">
					<form action="editAccount.php" method="post">
					<div class="formlabel"><b>First Name</b></div><div class="forminput"><input class="formText" type="text" name="first_name" value="<?php echo $_SESSION['first_name']; ?>"/></div>
					<div class="formlabel"><b>Last Time</b></div><div class="forminput"><input class="formText" type="text" name="last_name" value="<?php echo $_SESSION['last_name']; ?>"/></div>
					<div class="formlabel"><b>Birthday</b></div><div class="forminput"><input class="formText" type="date" name="bday" value="<?php echo $_SESSION['bday']; ?>"/></div>
					<div class="formlabel"><b>Sex</b></div><div class="forminput"><input class="formText" type="text" name="sex" value="<?php echo $_SESSION['sex']; ?>"/></div>
					<div class="formlabel"><b>Height</b></div><div class="forminput"><input class="formText" name="height" value="<?php echo $_SESSION['height']; ?>"/></div>
					<div class="formlabel"><b>Weight</b></div><div class="forminput"><input class="formText" type="number" name="weight" value="<?php echo $_SESSION['weight']; ?>"/></div>
					<div class="formsubmit"><input type="submit" value="Edit Info"/></div>
					</div>
				</form>
					<div class="form">
					<form action="deleteAccount.php" method="post">
						<div class="formsubmit"><input type="submit" value="Delete Account"/></div>
					</form>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>