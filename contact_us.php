<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    // Send an email (this is just a basic example)
    $to = "testmail@example.com";
    $subject = "New Contact Form Submission";
    $messageBody = "Name: $name\nEmail: $email\n\n$message";

    $headers = "From: $email";

    // Use the mail() function to send the email
    mail($to, $subject, $messageBody, $headers);

    // Display a thank you message using JavaScript
    echo '<script>alert("Thank you for your message!");</script>';

    // Redirect to index.php after the pop-up message
    echo '<script>window.location.href = "index.php";</script>';
    exit();
}

?>
