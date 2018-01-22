<?php
include('conn.php');
session_start();
if (isset($_POST['inputPass']) && isset($_POST['inputPass2']) && isset($_SESSION['StudentID']))
{
    $stuID = $_SESSION['StudentID'];
    $nwPass = mysqli_real_escape_string($conn, $_POST['inputPass']);
    $nwPass = stripslashes($nwPass);
    $nwPass1 = mysqli_real_escape_string($conn, $_POST['inputPass2']);
    $nwPass1 = stripslashes($nwPass1);
    $hashedPassword = password_hash($nwPass1, PASSWORD_DEFAULT);
    $checkEmail = "SELECT * FROM users WHERE studentID='$stuID'";
    $em_Result = mysqli_query($conn, $checkEmail);
    $em_Row = mysqli_fetch_array($em_Result, MYSQLI_ASSOC);
    $em_Count = mysqli_num_rows($em_Result);


    if (password_verify($nwPass, $em_Row['pass']))
    {
        $update = "UPDATE users SET pass='$hashedPassword' WHERE studentID='$stuID'";
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
        } else
        {
            echo "password does not match";
        }
    }
    else{
        echo "incorrect";
    }
}

