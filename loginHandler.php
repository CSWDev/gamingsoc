<?php
include("conn.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    if (isset($_POST['email']) && isset($_POST['password'])) // Like that for example
    {
        $myemail = mysqli_real_escape_string($conn, $_POST['email']);
        $myemail = stripslashes($myemail);
        $mypass = mysqli_real_escape_string($conn, $_POST['password']);
        $mypass = stripslashes($mypass);

        $sql = "SELECT * FROM users WHERE email='$myemail'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if ($count == 1)
        {
            if (password_verify($mypass, $row['pass']))
            {
                if($row['role'] == 'Member'){
                    //Create var to hold value = gets data from the row same as user according to the name of the column
                    $studentNumber = $row['studentID'];
                    //creates a session var that can be used anywhere after this method runs and puts the value of the var inside
                    $_SESSION['StudentID'] = $studentNumber;

                    $email = $row['email'];
                    $_SESSION['Email'] = $email;

                    $fname = $row['firstname'];
                    $_SESSION['Firstname'] = $fname;

                    $lname = $row['lastname'];
                    $_SESSION['Lastname'] = $lname;

                    $access = $row['role'];
                    $_SESSION['Role'] = $access;

                    $info = $row['info'];
                    $_SESSION['Information'] = $info;

                    $studentEmail = $row['studentEmail'];
                    //echo "hi " . $_SESSION['Firstname']. " ". $_SESSION['Lastname']. " " . $_SESSION['Role'];
                    header("location: userProfile.php");
                } elseif ($row['role'] == 'Admin'){
                    //Create var to hold value = gets data from ookthe row same as user according to the name of the column
                    $studentNumber = $row['studentID'];
                    //creates a session var that can be used anywhere after this method runs and puts the value of the var inside
                    $_SESSION['StudentID'] = $studentNumber;

                    $email = $row['email'];
                    $_SESSION['Email'] = $email;

                    $fname = $row['firstname'];
                    $_SESSION['Firstname'] = $fname;

                    $lname = $row['lastname'];
                    $_SESSION['Lastname'] = $lname;

                    $access = $row['role'];
                    $_SESSION['Role'] = $access;

                    $info = $row['info'];
                    $_SESSION['Information'] = $info;

                    $studentEmail = $row['studentEmail'];
                    //echo "hi " . $_SESSION['Firstname']. " ". $_SESSION['Lastname']. " " . $_SESSION['Role'];
                    header("location: adminProfile.php");
                }

            } else
            {
                echo "Error";
            }
        }
        else
        {
            echo "Username or password is incorrect";
        }
    }else
    {
        echo "Please enter a value";
    }
} else
{
    echo "Server Error";
}