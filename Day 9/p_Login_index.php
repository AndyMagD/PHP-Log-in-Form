<?php
// Start output buffering
ob_start();

include("functions/p_db_con.php");
include("functions/log_func.php");

// Start the session
session_start();

// Handle form submission
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Call loginUser func/ store the message
    $message = loginUser($username, $password);

    // Check if login was successful
    if ($message === true) {
        header("Location: p_home_index.php");
        ob_end_flush(); // Send the output buffer and end buffering
        exit();
    }
}

include("templates/header_login.html");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h2>Log-In</h2>
    Username: <br>
    <input type="text" name="username" required><br>
    Password: <br>
    <input type="password" name="password" required><br>
    <input type="submit" name="submit" value="Login"><br>
    <button type="button" onclick="window.location.href='p_register_index.php';">Register</button>
</form>

</body>
</html>
<?php
// Display the error message
    if (!empty($message) && $message !== true) {
        echo "<p>$message</p>";
    }

    include("templates/footer.html");

// End output buffering
ob_end_flush();
?>
