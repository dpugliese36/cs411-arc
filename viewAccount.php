<?php session_start(); ?>

<html>
    <body>
        <form action="editAccount.php" method="post">
            Full Name: <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>"/><br/>
            Birthday: <input type="date" name="bday" value="<?php echo $_SESSION['bday']; ?>"/><br/>
            Sex: <input type="text" name="sex" value="<?php echo $_SESSION['sex']; ?>"/><br/>
            Height: <input name="height" value="<?php echo $_SESSION['height']; ?>"/><br/>
            Weight: <input type="number" name="weight" value="<?php echo $_SESSION['weight']; ?>"/><br/>
            <input type="submit" value="Edit Info"/>
        </form>

        <form action="deleteAccount.php" method="post">
            <input type="submit" value="Delete Account"/>
        </form>
    </body>
</html>