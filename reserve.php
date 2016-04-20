<?php session_start() ?>
<html>
    <head>
		<script src="reserve.js"></script>
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
						<li><a href="findEquipment.php">Equipment</a></li>
						<li><a href="workout.php">Workout</a></li>
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
			<div id="pagetitle">Make Your Reservation!</div>
				<div id="content">
					<div class="form">
						<form action="reservations.php" method="post"  onsubmit="return verify();">
							<div class="formlabel"><b>Date</b></div><div class="forminput"><input class="formText" id="date" name="date" placeholder="Ex: 2016-04-19"></div>
							<div class="labelerror" id="datel"></div><div><span class="formerror" id="datee"></span></div>
							<div class="formlabel"><b>Start Time</b></div><div class="forminput"><input class="formText" id="start" name="startTime" placeholder="Ex: 13:30"></div>
							<div class="labelerror" id="startl"></div><div><span class="formerror" id="starte"></span></div>
							<div class="formlabel"><b>Duration</b></div><div class="forminput"><input class="formText" id="duration" name="endTime" placeholder="in minutes (240 max)"></div>
							<div class="labelerror" id="durationl"></div><div><span class="formerror" id="duratione"></span></div>
							<div class="formlabel"><b>Room ID</b></div><div class="forminput"><select class="formText" name="roomID">
								<option value="ARC205">ARC205 - All Purpose Room</option>
								<option value="ARC214">ARC214 - All Purpose Room</option>
								<option value="ARC235">ARC235 - Gymnasium</option>
								<option value="ARC178">ARC178 - Rock Climbing</option>
								<option value="ARC136">ARC136 - Kitchen</option>
							</select></div>
							<div class="formsubmit">
								<input type="submit" id="make" value="Make Reservation">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>