<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    
    <h3>Notices</h3>
    <ul>
        <!-- Display existing notices from the database -->
        <?php
        // Fetch and display notices from the database
        include 'db_connect.php';

        $conn = connectDB();
        $sql = "SELECT * FROM notices ORDER BY created_at DESC";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>{$row['title']} - {$row['created_at']}</li>";
        }

        mysqli_close($conn);
        ?>
    </ul>

    <h3>Add New Notice</h3>
    <form action="add_notice.php" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        
        <label for="content">Content:</label>
        <textarea id="content" name="content" rows="4" required></textarea>
        
        <input type="submit" value="Add Notice">
    </form>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>
