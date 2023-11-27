<?php
include 'db_connect.php';

// Implement functions to handle events (e.g., upload, retrieve)

// Example function to retrieve events
function getEvents($type) {
    // Connect to the database
    $conn = connectDB();

    // Perform query based on the event type (notice, video, picture)
    $query = "SELECT * FROM events WHERE type = '$type'";
    $result = mysqli_query($conn, $query);

    // Fetch events as an associative array
    $events = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Close the connection
    mysqli_close($conn);

    // Return the events
    return $events;
}

// Example function to upload an event
function uploadEvent($title, $date, $type, $file) {
    // Connect to the database
    $conn = connectDB();

    // Escape variables to prevent SQL injection
    $title = mysqli_real_escape_string($conn, $title);
    $date = mysqli_real_escape_string($conn, $date);
    $type = mysqli_real_escape_string($conn, $type);

    // Perform the query to insert the event into the database
    $query = "INSERT INTO events (title, date, type, file) VALUES ('$title', '$date', '$type', '$file')";
    mysqli_query($conn, $query);

    // Close the connection
    mysqli_close($conn);
}
?>
