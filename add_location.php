<?php
    // Get new location from form submission
    $newLocation = $_POST["new_location"];

    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "ccs_inventory";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to insert new location into database
    $stmt = $conn->prepare("INSERT INTO locations (name) VALUES 'new_location'");
    $stmt->bind_param("s", $newLocation);
    $stmt->execute();

    // Close database connection and return success message
    $stmt->close();
    $conn->close();
    echo "Location added successfully!";
?>
