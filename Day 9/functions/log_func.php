<?php
include("p_db_con.php");

function loginUser($username, $password) {
    global $conn; // Use the db connection from p_db_con.php

    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare("SELECT password FROM Reg_Form WHERE user = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                return true;
            } else {
                return "Invalid username or password.";
            }
        } else {
            return "Invalid username or password.";
        }

        $stmt->close();
    } else {
        return "Please enter both username and password.";
    }
}
?>