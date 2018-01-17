<?php
session_start();
echo 'Logging out';
header('refresh:3;url=index.php');
session_destroy();

exit();
