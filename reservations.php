<?php
echo "My first PHP script1!";
?>


<?php
    session_start();
	$startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $reservationNumber = $_POST['reservationNumber'];
    $netID = $_SESSION["netID"];
    
    $sex = $_POST['sex'];
    $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!($stmt = $mysqli->prepare("INSERT INTO Reservation(startTime, endTime, reservationNumber, netID)"
            + "VALUES (?, ?, ?, ?"))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    if (!$stmt->bind_param("ssss", $startTime, $endTime, $reservationNumber, $netID)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
?>
