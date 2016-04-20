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
				<div id="pagetitle">My Account</div>
				<div id="content">
					<div class="form">
						<form action="editAccount.php" method="post">
							<div class="formlabel"><b>First Name</b></div>
							<div class="forminput"><input class="formText" type="text" name="first_name" value="<?php echo $_SESSION['first_name']; ?>"/></div>
							<div class="formlabel"><b>Last Time</b></div>
							<div class="forminput"><input class="formText" type="text" name="last_name" value="<?php echo $_SESSION['last_name']; ?>"/></div>
							<div class="formlabel"><b>Birthday</b></div>
							<div class="forminput"><input class="formText" type="date" name="bday" value="<?php echo $_SESSION['bday']; ?>"/></div>
							<div class="formlabel"><b>Sex</b></div>
							<div class="forminput"><input class="formText" type="text" name="sex" value="<?php echo $_SESSION['sex']; ?>"/></div>
							<div class="formlabel"><b>Height</b></div>
							<div class="forminput"><input class="formText" name="height" value="<?php echo $_SESSION['height']; ?>"/></div>
							<div class="formlabel"><b>Weight</b></div>
							<div class="forminput"><input class="formText" type="number" name="weight" value="<?php echo $_SESSION['weight']; ?>"/></div>
							<div class="formsubmit"><input type="submit" value="Edit Info"/></div>
						</form>
					</div>
					
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
						</form>
					</div>
					
					<div class="form">
						<form action="deleteAccount.php" method="post">
							<div class="formsubmit"><input type="submit" value="Delete Account"/></div>
						</form>
					</div>
				</div>
				</div>
			</div>
		</div>
    </body>
</html>