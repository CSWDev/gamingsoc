<?php
$to = 'cei_w@hotmail.co.uk';
$subject = 'Hello!';
$message = 'Testing';
$headers = "From: zenbeats2695@gmail.com\r\n";
if (mail($to, $subject, $message, $headers))
{
    echo "SUCCESS";
    header("refresh:1.5; url=login.php");
}
else
{
    echo "ERROR";
    header("refresh:1.5; url=login.php");

}