<?php session_start(); ?>

<html>
	<head>
		<link rel="stylesheet" href="index.css"></style>
		<title>ARC Recreation Coordinator</title>
	</head>
    <body>
		<div id="main">
			<div class="phpdata" name="selectedNeed" id="selectedNeed"></div>
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
				<div id="pagetitle">Add Equipment</div>
				<div id="content">
					<div class="form">
						<form method="post">
							<div class="formlabel"><b>Name</b></div>
							<div class="forminput"><input class="formText" type="text"></div>
							<div class="formlabel"><b>Location</b></div>
							<div class="forminput"><select class="formText">
								<option value="ARClower">ARC Lower Level</option>
								<option value="ARCentrance">ARC Entrance Level</option>
								<option value="ARCupper">ARC Upper Level</option>
							</select></div>
							<!--<div class="formlabel"><b>Recommended Use</b></div>
							<div class="forminput"><input class="formText" type="text"></div>
							<div class="formlabel"></div>
							<div class="forminfo"><span class="formText"><i>Example: 3x5 reps, 10:00 duration</i></span></div>-->
							<div class="formlabel"><b>Description/Notes</b></div>
							<div class="forminput"><input class="formText" type="text"></div>
							<?php
					            $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
					            if ($mysqli->connect_errno) {
					                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
					            }

					            if (!($stmt = $mysqli->prepare("SELECT Purpose FROM PurposeSet"))) {
					                echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
					            }

					            if (!$stmt->execute()) {
					                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
					            }

					            $stmt->bind_result($name);
					            while ($stmt->fetch()) {
					                echo '<div class="smallformlabel"><b>' . $name . '</b></div>' . 
					                		'<div class="smallforminput"><input class="formText" type="checkbox" name="'
					                		. $name . '"></div>';
					            }

					            $stmt->close();
					            $mysqli->close();
					        ?>
							<div class="formsubmit"><input type="submit" value="Add Equipment"/></div>
						</form>
					</div>
				</div>
				</div>
			</div>
		</div>
    </body>
</html>