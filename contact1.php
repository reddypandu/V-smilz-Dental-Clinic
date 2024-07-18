<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from form
    $name = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['Email']);
    $subject_form = htmlspecialchars($_POST['Subject']);
    $number = htmlspecialchars($_POST['Number']);
    $message = htmlspecialchars($_POST['Message']);

    // Prepare email
    $to = "phanindragandikota2001@gmail.com";
    $subject = "You Got a New Message!";
    $txt = "Name: " . $name . "\r\nEmail: " . $email . "\r\nSubject: " . $subject_form . "\r\nNumber: " . $number . "\r\nMessage: " . $message;
    $headers = "From: chandrakanthkokkiripati1998@gmail.com" . "\r\n" .
               "CC: somebodyelse@example.com";

    // Validate email address
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (mail($to, $subject, $txt, $headers)) {
            // Redirect to thank you page
            header("Location: thankyou.html");
            exit();
        } else {
            echo "Error: Unable to send email. Please try again.";
        }
    } else {
        echo "Error: Invalid email address.";
    }
} else {
    // Method not allowed
    http_response_code(405);
    echo "405 Method Not Allowed. This script only handles POST requests.";
    exit();
}
?>
