<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = "";     // Default XAMPP password is empty
$dbname = "blood_donor"; // Database name created in phpMyAdmin

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert form data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $blood_group = $_POST['blood_group'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];

    // Prepare the SQL statement
    $sql = "INSERT INTO donors (name, blood_group, age, contact) VALUES ('$name', '$blood_group', $age, '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "New donor added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
