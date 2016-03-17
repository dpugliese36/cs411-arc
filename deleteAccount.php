<?php
    session_start();
    $netId = $_SESSION['netId'];

    $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!($stmt = $mysqli->prepare("DELETE FROM User WHERE NetID=?"))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    if (!$stmt->bind_param("s", $netId)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    else {
        $_SESSION['netId'] = '';
        $_SESSION['bday'] = '';
        $_SESSION['name'] = '';
        $_SESSION['height'] = '';
        $_SESSION['weight'] = '';
        $_SESSION['sex'] = '';
    }

    // Return to index
    echo "<script type='text/javascript'>window.location = '/';</script>";
?>