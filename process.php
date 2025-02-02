<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    // Sanitize and validate input fields
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate fields
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }
    if (empty($subject)) {
        $errors['subject'] = "Subject is required.";
    }
    if (empty($message)) {
        $errors['message'] = "Message is required.";
    }

    // Check for errors
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = [
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        ];
        header("Location: index.html");
        exit();
    }

    $to = "aabouzaid102@gmail.com";
    $header = "From: $email";

    // Send the email
    if (mail($to, $subject, $message, $header)) {
        $_SESSION['success'] = "Success email sent";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['errors'] = ["mail" => "Error sending email"];
        header("Location: index.php");
        exit();
    }
}
?>
