<?php
// Assume you have a database connection
include 'db_connect.php'
// Replace the placeholder values with your actual database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "events_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch notices from the database
$sql = "SELECT title, content FROM notices";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $notices = array();

    while ($row = $result->fetch_assoc()) {
        $notices[] = array(
            'title' => $row['title'],
            'content' => $row['content']
        );
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($notices);
} else {
    echo "No notices available.";
}

$conn->close();
?>
