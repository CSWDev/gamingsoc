<?php
include ('conn.php');
session_start();
$_SESSION['studentID'] = $stuID ;
if(isset($_POST['inputEmail']))
{
    $nwEmail = mysqli_real_escape_string($conn, $_POST['inputEmail']);
    $nwEmail = stripslashes($nwEmail);
    $checkEmail = "SELECT * FROM users WHERE email='$nwEmail'";
    $em_Result = mysqli_query($conn, $checkEmail);
    $em_Row = mysqli_fetch_array($em_Result, MYSQLI_ASSOC);
    $em_Count = mysqli_num_rows($em_Result);

    $update = "UPDATE users SET email='$nwEmail' WHERE studentID='$stuID'";

    if ($em_Count == 1)
    {
        echo "email already in use";
        header("refresh:1.5; url=userProfile.php");
    } else
    {
        $_SESSION['Email'] = $nwEmail;

        if ($conn->query($update) === true)
        {
            echo "Successful";
            header("refresh:1.5; url=userProfile.php");
            exit();
        } else
        {
            echo "1";
            header("refresh:1.5; url=userProfile.php");
            exit();
        }
    }
}
else
{
    echo "error";
}