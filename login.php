<?php
    session_start();
    if ($_SESSION["netId"] == "") {
        $netId = $_POST["netId"];
        $password = hash("sha256", $_POST['password']);

        $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        if (!($stmt = $mysqli->prepare("SELECT * FROM User WHERE NetID = ? AND Password = ?"))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        if (!$stmt->bind_param("ss", $netId, $password)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }

        $stmt->bind_result($netId, $first_name, $last_name, $height, $weight, $bday, $sex, $password, $verified, $code);
        if ($stmt->fetch()) {
            $_SESSION['netId'] = $netId;
            $_SESSION['bday'] = $bday;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['height'] = $height;
            $_SESSION['weight'] = $weight;
            $_SESSION['sex'] = $sex;

            echo "<script type='text/javascript'>window.location = '/';</script>";
        }
        else {
            echo "<script type='text/javascript'>alert('Incorrect netId or password'); window.location = '/signin.php';</script>";
        }
    }
?>