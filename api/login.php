<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Perform authentication here (check username and password against the database)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Add your authentication logic here
    // For simplicity, let's assume a hardcoded username and password
    $hardcoded_username = 'admin';
    $hardcoded_password = 'Shubham#987';

    if ($username === $hardcoded_username && $password === $hardcoded_password) {
        $_SESSION['user_id'] = 1; // Set a user ID (you may use the actual user ID from the database)
        header("Location: admin.php");
        exit();
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

<html>
<head>
    <link rel="stylesheet" href="login.css" />
    <title>Login</title>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>
    <?php if (isset($error_message)) echo "<p>$error_message</p>"; ?>
    <form id="login_form" method="post" action="">
        <div class="user-box">
            <input type="text" name="username" required>
            <label>Username</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" required>
            <label>Password</label>
        </div>
        <a onclick="document.getElementById('login_form').submit();">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Submit
        </a>
    </form>
</div>
</body>
</html>
