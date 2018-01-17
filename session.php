<?php
include "conn.php";
$db = mysqli_select_db("users", $conn);
session_start();
$userCheck = $_SESSION['login_user'];