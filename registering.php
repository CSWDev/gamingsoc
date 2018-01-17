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



//if(isset($email) && isset($password)) //etc
//if ($password == $password2)
//Those two lines will make sure everything is inputted
//as for the error when inserting into the database, Google the code for those two commands and make sure they're right
//in terms of how you think they work
// the html makes the user input those values so i probably wont be needing if ^
// ALWAYS need client and server side, it's good practice


//    Looking at where the project is stored, you was using the PHPStorm view, no XAMPP
//{
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
    define("RECAPTCHA_SECRET", "6Le6iTgUAAAAANCFTQgZjUbQjxagxdbWp_cjEOMN");
    $recaptcha_response = $_POST["g-recaptcha-response"];
    $response = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . RECAPTCHA_SECRET . '&response=' . $recaptcha_response));

    if (isset($password) === isset($password2))
    {
        If ($response->success === true)
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
    } else
    {
        echo 'Pass is dead';
    }
}
mysqli_close($conn);