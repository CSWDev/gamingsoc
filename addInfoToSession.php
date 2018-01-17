<?php
include ('conn.php');
session_start();

if (isset($_POST['inputInfo'])){
    $information = mysqli_real_escape_string($conn, $_POST['inputInfo']);
    $information = stripslashes($information);
    $_SESSION['Information'] = $information ;
    header("refresh:1.5; url=userProfile.php");
}
else
{
    echo "error";
}