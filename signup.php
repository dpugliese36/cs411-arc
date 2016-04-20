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
                        <li><a href="findEquipment.php">Equipment</a></li>
                        <li><a href="workout.php">Workout</a></li>
                        <li><a href="reserve.php">Reservations</a></li>
                    </ul>
                    <ul id="account">
                        <?php if (array_key_exists('netId', $_SESSION)): ?>
                            <li><a href="logout.php">Log Out</a></li>
                            <li><a href="viewAccount.php"><?php echo $_SESSION['netId']; ?></a></li>
                        <?php else: ?>
                            <li><a href="signin.php">Log In</a></li>
                            <li><a href="signup.php">Join</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div id="body">
            <div id="pagetitle">Make ARC Account<br/>You will recieve an email to confirm your account</div>
                <div id="content">
					<div class="form">
                    <form action="createAccount.php" method="post">
                        <div class="formlabel"><b>netID</b></div><div class="forminput"><input class="formText" type="text" name="netId" placeholder="netID"></div>
                        <div class="formlabel"><b>Password</b></div><div class="forminput"><input class="formText" type="password" name="password" placeholder="Password"></div>
                        <div class="formlabel"><b>Confirm Password</b></div><div class="forminput"><input class="formText" type="password" name="confirmpassword" placeholder="Confirm Password"></div>
                        <div class="formlabel"><b>First Name</b></div><div class="forminput"><input class="formText" type="text" name="first_name" placeholder="First Name"></div>
                        <div class="formlabel"><b>Last Name</b></div><div class="forminput"><input class="formText" type="text" name="last_name" placeholder="Last Name"></div>
                        <div class="formlabel"><b>Birthday</b></div><div class="forminput"><input class="formText" type="date" name="bday" placeholder="Birthday (YYYY-MM-DD)"></div>
                        <div class="formlabel"><b>Sex</b></div><div class="forminput"><input class="formText" type="text" name="sex" placeholder="sex"></div>
                        <div class="formlabel"><b>Height</b></div><div class="forminput"><input class="formText" name="height" placeholder="height">
						<select class="formText" name="htunit">
                            <option value="cm">cm</option>
                            <option value="inches">inches</option>
                        </select>
						</div>
                        <div class="formlabel"><b>Weight</b></div><div class="forminput"><input class="formText" name="weight" placeholder="weight">
                        <select class="formText" name="wtunit">
                            <option value="kg">kg</option>
                            <option value="lbs">lbs</option>
                            <option value="stone">stone</option>
                        </select></div>
						<div class="formsubmit">
							<input type="submit">
						</div>
                    </form>
					</div>
                </div>
            </div>
        </div>
    </body>
</html>