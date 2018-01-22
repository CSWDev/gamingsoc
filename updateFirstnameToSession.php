<?php
include ('conn.php');
session_start();
if(isset($_POST['firstname']) && isset($_SESSION['StudentID']))
{
    $stuID = $_SESSION['StudentID'] ;
    $nwFname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $nwFname = stripslashes($nwFname);
    $update = "UPDATE users SET firstname='$nwFname' WHERE studentID='$stuID'";

    $_SESSION['Firstname'] = $nwFname;

    if ($conn->query($update) === true)
    {
        if ($_SESSION['Role'] == "Admin")
        {
            echo "Successful";
            header("refresh:1.5; url=adminProfile.php");
            exit();
        } elseif ($_SESSION['Role'] == "Member")
        {
            echo "Successful";
            header("refresh:1.5; url=userProfile.php");
            exit();
        }
    }
    }
    else{
        echo "Error";
}