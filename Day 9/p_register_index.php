<?php
    include("functions/p_db_con.php");
    include ("templates/header_register.html");
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
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <h2>Join today!</h2>
            Username: <br>
            <input type="text" name="username" ><br>
            Password: <br>
            <input type="password" name="password" ><br>
            <input type="submit" name="submit" value="Register">


        </form>
    </body>
    </html>
<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include("functions/reg_func.php");
        registerUser($conn); // Call the registration function with $conn passed
    }

    //mysqli_close($conn);
?>