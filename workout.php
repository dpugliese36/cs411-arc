<?php session_start();
	if (!array_key_exists('goals', $_SESSION)) {
		$_SESSION['goals'] = array();
	}
	if (array_key_exists('delete', $_POST)) {
		if($index = array_search($_POST['delete'], $_SESSION['goals'])) {
			unset($_SESSION['goals'][$index]);
			$_SESSION['goals'] = array_values($_SESSION['goals']);
		}
	}
	if (array_key_exists('add', $_POST)) {
		if (!in_array($_POST['add'], $_SESSION['goals'])) {
			$_SESSION['goals'][] = $_POST['add'];
		}
	}
?>

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
						<form method="post" action="createWorkout.php">
							<div class="formlabel"><b>Current Needs/Goals</b></div>
							<div class="forminput"><select id="needs" class="formText" name="delete" size="5">
									<?php
										for ($i = 0; $i , count($_SESSION['goals']); $i++) {
											echo "<option value='" . $_SESSION['goals'][$i] . "'>" .
												$_SESSION['goals'][$i] . "</option>";
										}
									?>
								</select>
							</div>
							<div class="formsubmit"><input type="submit" formaction="workout.php" value="Delete Need"></div>
							<div class="formlabel"><b>Add Need/Goal</b></div>
							<div class="forminput">
								<select class="formText" name="add">
									<option value=""></option>
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
							                echo '<option value="' . $name . '">' . $name . '</option>';
							            }

							            $stmt->close();
							            $mysqli->close();
							        ?>
								</select>
							</div>
						<div class="formsubmit"><input type="submit" formaction="workout.php" value="Add Need"/></div>
						<div class="formsubmit"><input type="submit" value="Generate Workout"/></div>
						</form>
					</div>
				</div>
				</div>
			</div>
		</div>
    </body>
</html>