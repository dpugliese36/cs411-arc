<?php
    session_start();
	$startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    #$reservationNumber = $_POST['reservationNumber'];
    $studentNetID = $_SESSION["netId"];
    $roomID = $_POST["roomID"];
    
    $sex = $_POST['sex'];
    $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    $sql = "SELECT COUNT(netID) FROM Reservation WHERE netID=studentNetID;";
    $currentDate=date_create("2016-04-21");

    if ($mysqli->query($sql) < 3) {
        echo "hello worlds \n";
        $formDate = strtotime('d-m-Y',$startTime);
        $date = date('d-m-Y', $formDate);
        $diff = date_diff($date, $currentDate);
        echo $diff->format("%R%a days");
        if (!($stmt = $mysqli->prepare("INSERT INTO Reservation(StartTime, EndTime, netID, RoomID)"
                . " VALUES (?, ?, ?, ?)"))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
    } else {
    echo "Sorry, too many reservations.";
    }

    if (!$stmt->bind_param("ssss", $startTime, $endTime, $studentNetID, $roomID)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    else {
        echo "Reservation made successfully!";
    }
?>
