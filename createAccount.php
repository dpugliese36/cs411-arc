<?php
    /*****************************************************
    * This file makes the user account, but sets the 
    * confirmed field to false, it then sends an email
    * to the provided email address. This email has a link
    * to confirmAccount.php, which includes a hex string
    * as a get parameter. If the hex string passed to
    * confirmAccount.php matches the hex string saved to
    * the newly created account's row in the database, then
    * the account is confirmed and the user will be able to
    * log in.
    *****************************************************/

    session_start();
    $netId = $_POST['netId'];
    $bday = $_POST['bday'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $sex = $_POST['sex'];
    $password = hash("sha256", $_POST['password']);
    $code = hash("sha256", mt_rand());

    $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!($stmt = $mysqli->prepare("INSERT INTO User (NetID, Sex, FirstName, LastName, Birthday, Height, Weight, Password, Verified, VerificationCode)"
            . " VALUES (?, ?, ?, ?, ?, ?, ?, ?, 0, ?)"))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    if (!$stmt->bind_param("sssssssss", $netId, $sex, $first_name, $last_name, $bday, $height, $weight, $password, $code)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    else {
        $to = $netId . "@illinois.edu";
        $subject = "ARC Recreational Coordinator Account Confrimation";
        $message = "Thank you for signing up for ARC Recreational Coordinator!\r\n" .
            "To confirm your email address click the link below:\r\n" .
            "puglies2.web.engr.illinois.edu/confirmAccount.php?netId=" . 
            $netId . "&code=" . $code;
        $message = wordwrap($message, 70, "\r\n");
        $headers = 'From: arc-noreply@engr-cpanel2.engr.illinois.edu.edu' . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($to, $subject, $message);
    }

    // Return to index
    echo "<script type='text/javascript'>window.location = '/';</script>";
?>
