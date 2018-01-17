<?php
include 'conn.php';
session_start();

$user_Check = $_SESSION['StudentID'];

$sesh_sql = mysqli_query($conn, "SELECT studentID FROM users WHERE studentID = '$user_Check'");

$row = mysqli_fetch_array($sesh_sql, MYSQLI_ASSOC);

$login_session = $row['studentID'];

if (!isset($_SESSION['StudentID'])){
    header("location:login.php");
}

//What is all this?


//i stole it from w3c
//This is bad.. I'll show you an even easy/better way