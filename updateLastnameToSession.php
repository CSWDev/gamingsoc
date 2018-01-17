<?php
include ('conn.php');
session_start();

if(isset($_POST['lastname']))
{
    $nwLname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $nwLname = stripslashes($nwLname);
    $_SESSION['Lastname'] = $nwLname;
    header("refresh:1.5; url=userProfile.php");

}
else{
    echo "Error";
}