<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, textarea, button {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        textarea {
            resize: none;
            height: 100px;
        }
        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .success {
            color: green;
            font-size: 14px;
            margin-bottom: 10px;
        }
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
            input, textarea, button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        if (isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo "<div class='error'>$error</div>";
            }
            unset($_SESSION['errors']);
        }
        if (isset($_SESSION['success'])) {
            echo "<div class='success'>{$_SESSION['success']}</div>";
            unset($_SESSION['success']);
        }
        ?>
        <form action="process.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" value="<?php echo $_SESSION['old']['name'] ?? ''; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo $_SESSION['old']['email'] ?? ''; ?>" required>

            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" placeholder="Enter the subject" value="<?php echo $_SESSION['old']['subject'] ?? ''; ?>" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Write your message here" required><?php echo $_SESSION['old']['message'] ?? ''; ?></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
