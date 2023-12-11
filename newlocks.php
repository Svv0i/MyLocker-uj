<!DOCTYPE html>
<html>
<head>
    <title>Building Management System</title>
</head>
<body>
    <h1>Building Management System</h1>

    <!-- Form to add a building -->
    <h2>Add Building</h2>
    <form action="add_building.php" method="post">
        <label for="building_name">Building Name:</label>
        <input type="text" id="building_name" name="building_name" required>

        <label for="building_no">Building Number:</label>
        <input type="text" id="building_no" name="building_no" required>

        <input type="submit" value="Add Building">
    </form>

    <!-- Form to add a floor -->
    <h2>Add Floor</h2>
    <form action="add_floor.php" method="post">
       
        <label for="floor_no">Floor Number:</label>
        <input type="text" id="floor_no" name="floor_no" required>

        <label for="building">Select Building:</label>
        <select id="building" name="building" required>
            <?php
            // Fetch buildings from database and populate the select options
            $buildings = getBuildings(); // Custom function to retrieve buildings from the database

            foreach ($buildings as $building) {
                echo "<option value='" . $building['id'] . "'>" . $building['name'] . "</option>";
            }
            ?>
        </select>

        <input type="submit" value="Add Floor">
    </form>

    <!-- Form to add a drawer -->
    <h2>Add Drawer</h2>
    <form action="add_drawer.php" method="post">
        <label for="drawer_name">Drawer Name:</label>
        <input type="text" id="drawer_name" name="drawer_name" required>

        <label for="drawer_no">Drawer Number:</label>
        <input type="text" id="drawer_no" name="drawer_no" required>

        <label for="building">Select Building:</label>
        <select id="building" name="building" required>
            <?php
            // Fetch buildings from database and populate the select options
            $buildings = getBuildings(); // Custom function to retrieve buildings from the database

            foreach ($buildings as $building) {
                echo "<option value='" . $building['id'] . "'>" . $building['name'] . "</option>";
            }
            ?>
        </select>

        <label for="floor">Select Floor:</label>
        <select id="floor" name="floor" required>
            <?php
            // Fetch floors from database and populate the select options
            $floors = getFloors(); // Custom function to retrieve floors from the database

            foreach ($floors as $floor) {
                echo "<option value='" . $floor['id'] . "'>" . $floor['name'] . "</option>";
            }
            ?>
        </select>

        <input type="submit" value="Add Drawer">
    </form>

    <br>

    <!-- Link to the edit page -->
    <a href="edit.php">Edit Building, Floor, and Drawer</a>
</body>
</html>














    
    