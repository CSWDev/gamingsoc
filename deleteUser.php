<?php
include 'conn.php';
session_start();
$id = $_GET['edit_id'];
if (isset($_GET['edit_id']))
{
    $id = $_GET['edit_id'];
    $sql = "DELETE FROM users WHERE studentID='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}