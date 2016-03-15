<?php
    session_start();
    $netId = $_POST['netId'];
    $bday = $_POST['bday'];
    $name = $_POST['name'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $sex = $_POST['sex'];
    $password = hash("sha256", $_POST['password']);

    $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!($stmt = $mysqli->prepare("INSERT INTO User (NetId, Sex, Name, Birthday, Height, Weight, Password)"
            . " VALUES (?, ?, ?, ?, ?, ?, ?)"))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    if (!$stmt->bind_param("sssssis", $netId, $sex, $name, $bday, $height, $weight, $password)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    else {
        $_SESSION['netId'] = $netId;
        $_SESSION['bday'] = $bday;
        $_SESSION['name'] = $name;
        $_SESSION['height'] = $height;
        $_SESSION['weight'] = $weight;
        $_SESSION['sex'] = $sex;
    }

    // Return to index
    include("index.php");
?>
