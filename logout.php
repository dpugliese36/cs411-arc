<?php
    session_start();
    $_SESSION['netId'] = '';
    $_SESSION['bday'] = '';
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['height'] = '';
    $_SESSION['weight'] = '';
    $_SESSION['sex'] = '';
    session_destroy();

    echo "<script type='text/javascript'>window.location = '/';</script>";
?>