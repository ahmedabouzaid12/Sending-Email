# Sending Email

This is a simple contact form that allows users to submit their name, email, subject, and message. Once the user submits the form, the message is sent to a predefined email address using PHP's `mail()` function. The project demonstrates basic form handling and email submission in PHP.

## Features
- Simple HTML form for user input.
- PHP script to handle form submission and send email.
- Input validation to ensure secure data submission.
- Error handling for successful or failed submissions.

## How to Use
1. Clone or download the project.
2. Set up a server that supports PHP (e.g., XAMPP or a live server).
3. Update the email address in the `process.php` file:
   ```php
   $to = "youremail@example.com";  // Change this to your email
