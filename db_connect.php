<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "events_db";

// Create connection
function connectDB() {
    global $servername, $username, $password, $database;

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}
?>
