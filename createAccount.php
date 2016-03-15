<?php

    $netId = $_POST['netID'];
    $bday = $_POST['bday'];
    $name = $_POST['name'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $sex = $_POST['sex'];
    $password = $_POST['password'];

    $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    $stmt;

    if (!($stmt = $mysqli->prepare("INSERT INTO Users(NetId, Sex, Name, Birthday, Height, Weight, Password)"
            + "VALUES (1), (2), (3), (4), (5), (6), (7)"))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    var_dump($stmt);

    if (!$stmt->bind_param("sssssss", $netID, $sex, $name, $bday, $height, $weight, hash("sha256", $password))) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    echo "Account Created";
?>
