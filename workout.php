<?php session_start(); ?>

<html>
	<head>
		<script type="text/javascript" src="viewaccount.js"></script>
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
				<div id="pagetitle">Generate Workout</div>
				<div id="content">
					<div class="form">
						<form method="post">
							<div class="formlabel"><b>Current Needs/Goals</b></div>
							<div class="forminput"><table id="needs" class="formText">
								<tr>
									<td>Upper Body</td>
								</tr>
								<tr>
									<td>Cardio</td>
								</tr>
								</table>
							</div>
							<div class="formsubmit"><input type="submit" value="Delete Need"></div>
							<div class="formlabel"><b>Add Need/Goal</b></div>
							<div class="forminput"><select class="formText" name="">
								<option value="upperbody">Upper Body</option>
								<option value="lowerbody">Lower Body</option>
								<option value="cardio">Cardio</option>
								<option value="biceps">Biceps</option>
								<option value="chest">Chest</option>
								<option value="deltoids">Deltoids</option>
								<option value="forearms">Forearms</option>
								<option value="latissimusdorsi">Latissimus Dorsi</option>
								<option value="rotatorcuff">Rotator Cuff</option>
								<option value="trapezius">Trapezius</option>
								<option value="triceps">Triceps</option>
								<option value="calves">Calves</option>
								<option value="glutes">Glutes</option>
								<option value="hamstrings">Hamstrings</option>
								<option value="quadriceps">Quadriceps</option>
								<option value="shins">Shins</option>
								<option value="core">Core</option>
								</select>
							</div>
						<div class="formsubmit"><input type="submit" value="Add Need"/></div>
						<div class="formsubmit"><input type="submit" value="Generate Workout"/></div>
						</form>
					</div>
				</div>
				</div>
			</div>
		</div>
    </body>
</html>