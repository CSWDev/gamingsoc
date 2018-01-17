<?php
include 'conn.php';
$from = $_POST['email'];
$fName = $_POST['firstname'];
$lName = $_POST['lastname'];
$subject = $_POST['subject'];
$txt = $_POST['Message'];
$date = date("y-m-d h:i:s");
$addMessage = "INSERT INTO contactmessages (emailAddr, firstname, lastname, subject, message, date) VALUES ('$from', '$fName','$lName', '$subject', '$txt', '$date')";
if(empty($from) ||empty($fName) || empty($lName) || empty($subject) || empty($txt))
{
    echo "Please enter all required fields";
    exit;
}
elseif ($conn->query($addMessage)=== true){
    echo '<div id="snackbar">Message successfully sent!</div>';
    header("refresh:1.5; url=Contact.php");
 } else {
     echo "Please try again";
     header("refresh:1.5; url=Contact.php");
     exit();
 }
?>