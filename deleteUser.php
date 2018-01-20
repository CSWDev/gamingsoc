<?php
include 'conn.php';
session_start();
$id = $_GET['edit_id'];
if (isset($_GET['edit_id']))
{
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = stripslashes($password);
    $email = $_SESSION['Email'];
    $sql ="SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    $id = $_GET['edit_id'];
    $sql = "DELETE FROM users WHERE studentID='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

    if ($count == 1)
    {
        if (password_verify($password, $row['pass']))
        {
            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully";
                header("refresh:1.5; url=adminViewUsers.php");
                exit();
            }
            else {
                echo "Error deleting record: " . $conn->error;
                header("refresh:1.5; url=adminViewUsers.php");
            }
        }
    }
    else {
        echo "password error";
        header("refresh:1.5; url=adminViewUsers.php");
    }




    $conn->close();
}