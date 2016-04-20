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
				<div id="pagetitle">Your Workout</div>
				<div id="content">
<?php
if (array_key_exists('goals', $_SESSION)) {
    $goals = $_SESSION['goals'];

    for ($i = 0; $i < count($goals); $i++) {
        $goals[$i] = "'" . $goals[$i] . "'";
    }

    $clause = implode(',', $goals);

    $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!($stmt = $mysqli->prepare("SELECT EquipId, EquipName, Building, Floor FROM Location INNER JOIN Function ON Location.EquipName = Function.EquipName WHERE Function.Purpose IN " . $clause ." ORDER BY Building, Floor"))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->bind_result($id, $name, $building, $floor)) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    $possible = array();

    while ($stmt->fetch()) {
        $possible[] = [$id, $name, $building, $floor];
    }

    if (count($possible) <= 5) {
        echo "Use ";
        for ($i = 0; $i < count($possible); $i++) {
            echo $possible[$i][1] . " in " . $possible[$i][2] . " on " . $possible[$i][3];
            if ($i < count($possible) - 1) {
                echo ", ";
            }
        }
    }
    else {
        $pickedBuilding = $possible[0][2];
        $pickedFloor = $possible[0][3];

        $picked = array();
        //Try to find all on same floor
        for ($i = 0; $i < count($possible); $i++) {
            if ($possible[$i][2] == $pickedBuilding && $possible[$i][3] == $pickedFloor) {
                $picked[] = $possible[$i];
                if (count($picked) == 5) {
                    break;
                }
            }
            else {
                $picked = array();
                $pickedBuilding = $possible[$i][2];
                $pickedFloor = $possible[$i][3];
            }
        }
        if (count($picked) < 5) {
            $pickedBuilding = $possible[0][2];

            $picked = array();
            //Try to find all in same building
            for ($i = 0; $i < count($possible); $i++) {
                if ($possible[$i][2] == $pickedBuilding) {
                $picked[] = $possible[$i];
                if (count($picked) == 5) {
                    break;
                }
            }
            else {
                $picked = array();
                $pickedBuilding = $possible[$i][2];
            }
            }
            if (count($picked) < 5) {
                shuffle($possible);
                for ($i = 0; $i < 5; $i++) {
                    echo $possible[$i][1] . " in " . $possible[$i][2] . " on " . $possible[$i][3];
                    if ($i < count($possible) - 1) {
                        echo ", ";
                    }
                }
            }
        }
    }

    $stmt->close();
    $mysqli->close();
}
?>
				</div>
				</div>
			</div>
		</div>
    </body>
</html>