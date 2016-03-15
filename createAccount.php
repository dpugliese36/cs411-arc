<?php

    $netId = $_POST['netID'];
    $bday = $_POST['bday'];
    $name = $_POST['name'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $sex = $_POST['sex'];
    $password = $_POST['password'];
    $password = hash("sha256", $password);

    $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    // if (!($stmt = $mysqli->prepare("INSERT INTO User (NetId, Sex, Name, Birthday, Height, Weight, Password)"
    //         . " VALUES (?, ?, ?, ?, ?, ?, ?)"))) {
    //     echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    // }

    // $stmt->debugDumpParams();

    // if (!$stmt->bind_param("sssssis", $netID, $sex, $name, $bday, $height, $weight, $password)) {
    //     echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    // }

    // $stmt->debugDumpParams();

    // if (!$stmt->execute()) {
    //     echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    // }

    $stmt = "INSERT INTO User (NetId, Sex, Name, Birthday, Height, Weight, Password) "
        . "VALUES ('{$netId}', '{$sex}', '{$name}', '{$bday}', '{$height}', '{$weight}', '{$password}');";

    $result = $mysqli->query($stmt);

    if ($result === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $mysqli->error;
    }
?>
