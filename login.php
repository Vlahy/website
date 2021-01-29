<?php

session_start();
include('dbconn.php');

$username = $_POST['username'];
$password = $_POST['password'];

$querry ="SELECT * FROM user WHERE username='$username' AND password='$password'";
$results = mysqli_query($conn,$querry);

if (mysqli_num_rows($results) == 1) {
    $qry = mysqli_fetch_array($results);
    $_SESSION['user_id'] = $qry['user_id'];
    $_SESSION['username'] = $qry['username'];
    $_SESSION['user_type'] = $qry['user_type'];
    if($qry['user_type']=="admin"){
        header("Location: admin_page.php");
    }elseif($qry['user_type']=="user"){
        header("Location: home.php");
    }
}else {
    echo "Error";
    header("Location: index.php");
}
?>