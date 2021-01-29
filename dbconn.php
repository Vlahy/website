<?php

$DB_HOST = "localhost:3308";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "site";

$conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME) or die ("Cann't connect to database" . mysqli_error());

?>