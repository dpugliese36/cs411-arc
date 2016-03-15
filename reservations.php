<!DOCTYPE html>
<html>
	<body>

		<?php
			echo "My first PHP script!";
		?>

		<?php
		$servername = "http://puglies2.web.engr.illinois.edu";
		$username = "puglies2_tbd4";
		$password = "arcarctbd4";

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    echo "Connected successfully"; 
		    }
		catch(PDOException $e)
		    {
		    echo "Connection failed: " . $e->getMessage();
		    }
		?>

	</body>
</html>