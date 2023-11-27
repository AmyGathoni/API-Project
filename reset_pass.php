<?php
// Include your database connection file
include("login_connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Validate the email (you may add more validation)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Check if the email exists in your database
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Generate a unique token
        $token = bin2hex(random_bytes(32));

        // Insert the token into the database
        $update_query = "UPDATE users SET reset_token = ? WHERE email = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        // Send an email with a link to reset_password_form.php, including the token
        $reset_link = "http://yourwebsite.com/reset_pass_form.php?token=$token";

        $to = $email;
        $subject = "Password Reset";
        $message = "Click the following link to reset your password: $reset_link";

        // Send the email (you may use a library like PHPMailer for better functionality)
        mail($to, $subject, $message);

        echo "An email has been sent with instructions to reset your password.";
    } else {
        echo "Email not found in the database.";
    }
}

// Close your database connection
mysqli_close($connection);
?>
