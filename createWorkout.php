<?php
session_start();

if (array_key_exists('purpose', $_POST)) {
    $purpose = $_POST['purpose'];

    $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!($stmt = $mysqli->prepare("SELECT EquipId, EquipName, Building, Floor FROM Location INNER JOIN Function ON Location.EquipName = Function.EquipName WHERE Function.Purpose = ? ORDER BY Building, Floor"))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    if (!$stmt->bind_param("s", $purpose)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
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

    $stmt->close();
    $mysqli->close();
}
?>