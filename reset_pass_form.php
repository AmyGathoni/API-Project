<?php
// Include your database connection file
include("login_connection.php");

// Retrieve the token from the URL
$token = $_GET["token"];

// Check if the token exists in the database
$query = "SELECT * FROM users WHERE reset_token = '$token'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) == 1) {
    // Display the password reset form
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Reset Password</title>
    </head>
    <body>
        <h2>Reset Password</h2>
        <form action='update_pass.php' method='post'>
            <input type='hidden' name='token' value='$token'>
            <label for='new_password'>New Password:</label>
            <input type='password' name='new_password' required>
            <label for='confirm_password'>Confirm Password:</label>
            <input type='password' name='confirm_password' required>
            <button type='submit'>Reset Password</button>
        </form>
    </body>
    </html>";
} else {
    echo "Invalid or expired token.";
}

// Close your database connection
mysqli_close($connection);
?>
