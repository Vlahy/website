<?php

include('dbconn.php');

$username = $_POST['usernameReg'];
$password = $_POST['passwordReg'];

mysqli_query($conn, "INSERT INTO user (username, password) VALUES ('$username', '$password')");

header("Location: index.php");

?>