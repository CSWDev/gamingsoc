<?php
include ('conn.php');
session_start();

if (isset($_POST['inputInfo'])&& isset($_SESSION['StudentID'])){
    $stuID = $_SESSION['StudentID'] ;
    $information = mysqli_real_escape_string($conn, $_POST['inputInfo']);
    $information = stripslashes($information);
    $update = "UPDATE users SET info='$information' WHERE studentID='$stuID'";
    $_SESSION['Information'] = $information ;

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
else
{
    echo "error";
}