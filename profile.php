
<html>
<head>
    <?php
    session_start();
    ?>
<title>Welcome </title>
</head>

<body>
<?php
if (isset($_SESSION['Firstname']))
{
    ?>
    <h1>Welcome <?php echo  "hi " . $_SESSION['Firstname']. " ". $_SESSION['Lastname']. " " . $_SESSION['Role']; ?></h1>
    <h2><a href="">Sign Out</a></h2>
    <?php
}
else
{
    ?>
<h1>Welcome guest</h1>
    <?php
}
?>
</body>

