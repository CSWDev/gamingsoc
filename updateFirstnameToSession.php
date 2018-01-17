<?php
include ('conn.php');
session_start();

if(isset($_POST['firstname']))
{
    $nwFname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $nwFname = stripslashes($nwFname);
    $_SESSION['Firstname'] = $nwFname;
    header("refresh:1.5; url=userProfile.php");

}
else{
    echo "Error";
}