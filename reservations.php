<?php
    session_start();
	$startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $date = $_POST['date'];
    $startDate = $date . " " . $startTime . ":00";
    $endDate = $date . " " . $endTime . ":00";
    #$reservationNumber = $_POST['reservationNumber'];
    $studentNetID = $_SESSION["netId"];
    $roomID = $_POST["roomID"];
    
    $sex = $_POST['sex'];
    $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    $sql = "SELECT COUNT(netID) FROM Reservation WHERE netID='" . $studentNetID . "';";
    $sql_time_check = "SELECT StartTime, EndTime, RoomID FROM Reservation WHERE(('" . $startDate . "' BETWEEN StartTime AND EndTime) OR ('" . $endDate . "' BETWEEN StartTime AND EndTime)) AND (RoomID ='" . $roomID . "');";
    echo $sql_time_check;
    $currentDate=date_create("2016-04-21");

    $reservations = $mysqli->query($sql_time_check)->fetch_row();

    if ($mysqli->query($sql)->fetch_row()[0] < 30 && $reservations == NULL) {
        echo "hello worlds \n";
        // $formDate = strtotime('d-m-Y',$startTime);
        // $date = date('d-m-Y', $formDate);
        // $diff = date_diff($date, $currentDate);
        // echo $diff->format("%R%a days");
        //var_dump($mysqli->query($sql)->fetch_row()[0]);
        echo "yes";
        var_dump($reservations);
        echo "yes";
        if (!($stmt = $mysqli->prepare("INSERT INTO Reservation(StartTime, EndTime, netID, RoomID)"
                . " VALUES (?, ?, ?, ?)"))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        if (!$stmt->bind_param("ssss", $startDate, $endDate, $studentNetID, $roomID)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        else {
            echo "Reservation made successfully!";
        }
    } else {
        if($mysqli->query($sql)->fetch_row()[0] >= 30)
            echo "Sorry, you can only have 2 active reservations at any given time";
        else if($reservations != NULL)
            echo "Sorry, somebody else already has that room reserved at that time.";
    }

?>
