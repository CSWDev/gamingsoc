<?php
include 'conn.php';
$searchValue = $_POST['search'];
$sql = "SELECT * FROM users WHERE studentID='$searchValue'";

$searchResult = mysqli_query($conn, $searchValue);


