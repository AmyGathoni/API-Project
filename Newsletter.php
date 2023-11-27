<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    $name = $_POST["name"];
    $email = $_POST["mail"];
    $subscribe = isset($_POST["subscribe"]) ? "Yes" : "No";

    // Email details
    $to = "testmail@example.com";
    $subject = "New Subscriber";
    $message = "Name: $name\nEmail: $email\nSubscribe to Daily Newsletter: $subscribe";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for subscribing! An email confirmation has been sent.";
    } else {
        echo "Error sending the email.";
    }
}
?>
