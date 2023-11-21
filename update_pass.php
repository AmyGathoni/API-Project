<?php
// Include your database connection file
include("connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the token and new password from the form
    $token = $_POST["token"];
    $new_password = password_hash($_POST["new_password"], PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];

    // Verify that the new password matches the confirmation password
    if ($new_password === $confirm_password) {
        // Update the password in the database
        $update_query = "UPDATE users SET password = '$new_password', reset_token = NULL WHERE reset_token = '$token'";
        mysqli_query($connection, $update_query);

        echo "Password updated successfully.";

        // You may redirect the user to the login page or display a link to the login page
        header("Location: login.php");
        exit();
    } else {
        echo "New password and confirmation password do not match.";
    }
}

// Close your database connection
mysqli_close($connection);
?>

