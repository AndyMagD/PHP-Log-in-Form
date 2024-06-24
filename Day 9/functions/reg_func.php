<?php
function registerUser($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($username) || empty($password)) {
            echo "Username or Password is empty";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $SQL = "INSERT INTO Reg_Form (user, password) VALUES ('$username', '$hash')";
            try {
                mysqli_query($conn, $SQL);
                echo "You have successfully registered";
            } catch (mysqli_sql_exception $e) {
                echo "Username already exists";
            }
        }
    }
}
?>