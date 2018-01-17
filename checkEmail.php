<?php
include 'conn.php';
$new_Email = $_POST['email'];
$checkEmail = "SELECT * FROM users WHERE email='$new_Email'";
$result = mysqli_query(conn, $checkEmail);

if (mysqli_fetch_assoc($result))
{
    if (mysqli_num_rows($result) == 1)
    {
        echo "Email already is in use";
        header("refresh:1.5; url=.php");
        exit();
    }
    else{

    }
}