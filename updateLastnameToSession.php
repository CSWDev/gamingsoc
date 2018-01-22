<?php
include ('conn.php');
session_start();
if(isset($_POST['lastname']) && isset($_SESSION['StudentID']))
{
    $stuID = $_SESSION['StudentID'] ;
    $nwLname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $nwLname = stripslashes($nwLname);
    $update = "UPDATE users SET lastname='$nwLname' WHERE studentID='$stuID'";

    $_SESSION['Lastname'] = $nwLname;

    if ($conn->query($update) === true){
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

    } else {
        echo "1";
        header("refresh:1.5");
        exit();
    }
}
else{
    echo "Error";
}