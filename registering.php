<?php
include 'conn.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$email = stripslashes($email);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password = stripslashes($password);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
$password2 = stripslashes($password2);
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$firstname = stripslashes($firstname);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$lastname = stripslashes($lastname);
$role = $_POST['role'];
$studentID = mysqli_real_escape_string($conn, $_POST['studentNum']);
$studentID = stripslashes($studentID);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$addUser = "INSERT INTO users (studentID, studentEmail ,email, pass, firstname, lastname, info, role) VALUES ('$studentID','','$email', '$hashedPassword','$firstname', '$lastname','','$role')";




$checkEmail = "SELECT * FROM users WHERE email='$email'";
$em_Result = mysqli_query($conn, $checkEmail);
$em_Row = mysqli_fetch_array($em_Result, MYSQLI_ASSOC);
$em_Count = mysqli_num_rows($em_Result);

$checkSTU = "SELECT * FROM users WHERE studentID='$studentID'";
$stu_Result = mysqli_query($conn, $checkSTU);
$stu_Row = mysqli_fetch_array($stu_Result, MYSQLI_ASSOC);
$stu_Count = mysqli_num_rows($stu_Result);

if ($em_Count == 1)
{
    echo "Email is already used.";
    header("refresh:1.5; url=register.php");
} elseif ($stu_Count == 1)
{
    echo "Student ID invalid.";
    header("refresh:1.5; url=register.php");
} else
{
    if (isset($password) === isset($password2))
    {
        if ($conn->query($addUser) === true)
        {
            echo "Successful";
            header("refresh:1.5; url=adminViewUsers.php");
            exit();
        } else
        {
            echo "Failed";
            header("refresh:1.5; url=register.php");
            exit();
        }
    } else
    {
        echo "connection failed";
    }

}

mysqli_close($conn);