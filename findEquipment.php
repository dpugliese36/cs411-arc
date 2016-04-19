<?php
session_start();
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
				<div id="pagetitle">Equipment Catalog</div>
				<div id="content">
					<div class="form">
						<form action="findEquipment.php" method="post">
						<div class="formlabel"><b>Equipment Type</b></div>
						<select name="equipment">
							<?php
								$mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
								if ($mysqli->connect_errno) {
									echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
								}

								if (!($stmt = $mysqli->prepare("SELECT EquipName FROM Equipment"))) {
									echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
								}

								if (!$stmt->execute()) {
									echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
								}

								$stmt->bind_result($name);
								echo "<div class=\"forminput\">";
								while ($stmt->fetch()) {
									echo "<option>" . $name . "</option>";
								}
								echo "</div>";

								$stmt->close();
								$mysqli->close();
							?>
							</select>
							<div class="formsubmit"><input type="submit" name="Find" value="Search"></div>
						</form>
					</div>
					<?php
if (array_key_exists('equipment', $_POST)) {
    $equipmentType = $_POST['equipment'];

    $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!($stmt = $mysqli->prepare("SELECT EquipId, Building, Floor, Purpose FROM Location INNER JOIN Function ON Location.EquipName = Function.EquipName WHERE Location.EquipName = ? ORDER BY Building, Floor, Purpose"))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    if (!$stmt->bind_param("s", $equipmentType)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    echo "<table><tr><th>ID #</th><th>Building</th><th>Floor</th><th>Purpose</th><tr>";

    if (!$stmt->bind_result($id, $building, $floor, $purpose)) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    while ($stmt->fetch()) {
        echo "<tr>";

        echo "<td>" . $id . "</td><td>" . $building . "</td><td>" . $floor . "</td><td>" . $purpose . "</td>";

        echo "</tr>";
    }

    $stmt->close();
    $mysqli->close();

    echo "</table>";

}
?>
				</div>
				</div>
			</div>
		</div>
    </body>
</html>

