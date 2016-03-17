<?php
    session_start();
    $netId = $_SESSION['netId'];
    $bday = $_POST['bday'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $sex = $_POST['sex'];

    $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!($stmt = $mysqli->prepare("UPDATE User SET Sex=?, FirstName=?, LastName=?, Birthday=?, Height=?, Weight=?"
            . " WHERE NetID=?"))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    if (!$stmt->bind_param("ssssss", $sex, $first_name, $last_name, $bday, $height, $weight, $netId)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    else {
        $_SESSION['bday'] = $bday;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['height'] = $height;
        $_SESSION['weight'] = $weight;
        $_SESSION['sex'] = $sex;
    }

    // Return to index
    echo "<script type='text/javascript'>window.location = '/';</script>";
?>