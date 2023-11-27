<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    include 'connect.php';

    $conn = connectDB();
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $sql = "INSERT INTO notices (title, content) VALUES ('$title', '$content')";

    if (mysqli_query($conn, $sql)) {
        // Redirect to the admin dashboard after adding the notice
        header("Location: admin_noticeboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
