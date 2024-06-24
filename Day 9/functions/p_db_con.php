<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "example";
$db_name = "myapp";
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

echo ($conn) ? "" : "Could Not Connect <br>";