<?php session_start() ?>
<html>
    <head>
        <link rel="stylesheet" href="index.css"></style>
        <title>ARC Signup</title>
    </head>
    <body>
        <div id="main">
            <div id="top">
                <img id="headerimage" src="Header.png"><img>
                <img src="Logo.png"></img>
                <div id="header">
                    <ul id="navigation">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="index.php">Activities</a></li>
                        <li><a href="reserve.php">Reservations</a></li>
                    </ul>
                    <ul id="account">
                        <?php if (array_key_exists('username', $_SESSION)): ?>
                            <li><a href="logout.php">Log Out</a></li>
                            <li>Logged in as <?php echo $_SESSION['netId']; ?></li>
                        <?php else: ?>
                            <li><a href="signin.php">Log In</a></li>
                            <li><a href="signup.php">Join</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div id="body">
            <div id="pagetitle">Make ARC Account</div>
                <div id="content">
                    <form action="confirmAccount.php" method="post">
                        <input class="smallText" type="text" name="netId" placeholder="netID"><br>
                        <input class="smallText" type="password" name="password" placeholder="Password"><br>
                        <input class="smallText" type="password" name="confirmpassword" placeholder="Confirm Password"><br>
                        <input class="smallText" type="text" name="first_name" placeholder="First Name"><br>
                        <input class="smallText" type="text" name="last_name" placeholder="Last Name"><br>
                        <input class="smallText" type="date" name="bday" placeholder="Birthday (YYYY-MM-DD)"><br>
                        <input class="smallText" type="text" name="sex" placeholder="sex"><br>
                        <div class="smallText"><input name="height" placeholder="height">
                        <select name="htunit">
                            <option value="cm">cm</option>
                            <option value="inches">inches</option>
                        </select>
                        </div>
                        <br>
                        <div class="smallText"><input name="weight" placeholder="weight">
                        <select name="wtunit">
                            <option value="kg">kg</option>
                            <option value="lbs">lbs</option>
                            <option value="stone">stone</option>
                        </select>
                        </div>
                        <br><br>
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>