<?php
session_start();
?>

<form action="findEquipment.php" method="post">
    <select name="equipment">
        <?php
            $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            if (!($stmt = $mysqli->prepare("SELECT EquipName FROM Equipment"))) {
                echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
            }

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            $stmt->bind_result($name);
            while ($stmt->fetch()) {
                echo "<option>" . $name . "</option>";
            }

            $stmt->close();
            $mysqli->close();
        ?>
    </select>
    <input type="submit" name="Find"/>
</form>

<?php
if (array_key_exists('equipment', $_POST)) {
    $equipmentType = $_POST['equipment'];

    $mysqli = new mysqli("puglies2.web.engr.illinois.edu", "puglies2_tbd4", "arcarctbd4", "puglies2_arc");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!($stmt = $mysqli->prepare("SELECT EquipId, Building, Floor, Purpose FROM Location INNER JOIN Function ON Location.EquipName = Function.EquipName WHERE Location.EquipName = ? ORDER BY Building, Floor, Purpose"))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    if (!$stmt->bind_param("s", $equipmentType)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    echo "<table><tr><th>ID #</th><th>Building</th><th>Floor</th><th>Purpose</th><tr>";

    if (!$stmt->bind_result($id, $building, $floor, $purpose)) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    while ($stmt->fetch()) {
        echo "<tr>";

        echo "<td>" . $id . "</td><td>" . $building . "</td><td>" . $floor . "</td><td>" . $purpose . "</td>";

        echo "</tr>";
    }

    $stmt->close();
    $mysqli->close();

    echo "</table>";

}
?>

