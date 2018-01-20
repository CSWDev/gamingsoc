<?php
include 'conn.php';
session_start();
$id = $_GET['edit_id'];

if (isset($_GET['edit_id']))
{
    $id = $_GET['edit_id'];
    $sql = "SELECT * FROM users WHERE studentID='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
}
if (isset($_POST['btn-update']))
{
    $stuEmail = $_POST['studentEmail'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $info = $_POST['Info'];
    $role = $_POST['role'];
    $update = "UPDATE users SET studentEmail='$stuEmail', email='$email', firstname='$firstname', lastname='$lastname', info='$info', role='$role' WHERE studentID='$id'";
    $up = mysqli_query($conn, $update);
    if (!isset($sql))
    {
        die("Error" . mysqli_connect_error());
    } else
    {
        header("refresh:1.5; url=adminViewUsers.php");
    }
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="Contact.php">Contact</a></li>
                <li><a href="gallery.php">Gallery</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (!isset($_SESSION['Firstname']))
                {
                    ?>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php
                } else if (isset($_SESSION['Firstname']) && ($_SESSION['Role'] == "Member"))
                {
                    ?>
                    <p class="navbar-text"><?php echo "Welcome " . $_SESSION['Firstname'] . "!"; ?></p>
                    <li><a href="userProfile.php">Profile</a></li>
                    <li><a href="signOut.php">Logout</a></li>
                    <?php
                } else if (isset($_SESSION['Firstname']) && ($_SESSION['Role'] == "Admin"))
                {
                    ?>
                    <p class="navbar-text"><?php echo "Welcome " . $_SESSION['Firstname'] . "! (Admin)"; ?></p>
                    <li><a href="adminPanel.php">Admin Panel</a></li>
                    <li><a href="adminProfile.php">Profile</a></li>
                    <li><a href="signOut.php">Logout</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<br>
<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-2 sidenav">
        </div>
        <div class="col-sm-8 text-left">
            <h1>Edit Management</h1>
            <hr>
        </div>
        <div class="col-sm-2 ">
        </div>
    </div>
</div>
<div class="container">
    <div class="col-sm-offset-2 col-sm-6">
        <div class="card card-container text-center">
            <br>
            <img id="profile-img" class="profile-img-card " src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"  />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-register" method="post" action="">
                <span id="reauth-email" class="reauth-email"></span>
                <br>
                <input type="email" name="studentEmail" id="inputStudentNum" class="form-control" placeholder="student email" value="<?php echo $row['studentEmail'];?>" required autofocus>
                <br>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="email" value="<?php echo $row['email'];?>" required autofocus>
                <br>
                <input type="text" name="firstname" id="inputFirstname" class="form-control" placeholder="Firstname" value="<?php echo $row['firstname'];?>" required autofocus>
                <br>
                <input type="text" name="lastname" id="inputLastname" class="form-control" placeholder="Lastname" value="<?php echo $row['lastname'];?>" required autofocus>
                <br>
                <input type="text" name="Info" id="inputLastname" class="form-control" placeholder="Info" value="<?php echo $row['info'];?>" required autofocus>
                <br>
                <select name="role" class="form-control" required autofocus>
                    <option value="Admin">Admin</option>
                    <option value="Member">Member</option>
                </select>
                <br>
                <button class="btn btn-lg btn-primary btn-block btn-update" name="btn-update" id="btn-update" type="submit" onclick="update()">Register</button>
                <br>
                <a href="adminViewUsers.php"><button class="btn btn-lg btn-primary btn-block btn-cancel" name="btn-cancel" id="btn-cancel">Cancel</button></a>

                <div class="col-sm-4"></div>
            </form>
        </div>
    </div>
</div>
</body>


<footer class="container-fluid text-center">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</footer>
<script>
function update(){
    var x;
    if (confirm("Updated Successfully") == true){
            x="update";
    }
}
</script>
</html>
