<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cardiff Metropolitan Gaming Society</title>
    <?Php
        session_start();
    ?>
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
                <li class="active"><a href="gallery.php">Gallery</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (!isset($_SESSION['Firstname']))
                {
                    ?>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php
                }
                else if (isset($_SESSION['Firstname']) && ($_SESSION['Role'] == "Member"))
                {
                    ?>
                    <p class="navbar-text"><?php echo "Welcome " . $_SESSION['Firstname'] . "!"; ?></p>
                    <li><a href="userProfile.php">Profile</a></li>
                    <li><a href="signOut.php">Logout</a></li>
                    <?php
                }
                else if (isset($_SESSION['Firstname']) && ($_SESSION['Role'] == "Admin"))
                {
                    ?>
                    <p class="navbar-text"><?php echo "Welcome " . $_SESSION['Firstname'] . "! (Admin)"; ?></p>
                    <li><a href="adminPanel.php">Admin Panel</a></li>
                    <li class="active"><a href="adminProfile.php">Profile</a></li>
                    <li><a href="signOut.php">Logout</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="col-sm-offset-2 col-sm-6">
        <div class="card card-container text-center">
        <br>
            <img id="profile-img" class="profile-img-card " src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"  />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-register" method="post" action="registering.php">
                <span id="reauth-email" class="reauth-email"></span>
                <br>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Student Email" required autofocus>
                <br>
                <input type="text" name="studentNum" id="inputStudentNum" class="form-control" placeholder="Student Number" required autofocus>
                <br>
                <input type="text" name="firstname" id="inputFirstname" class="form-control" placeholder="Firstname" required autofocus>
                <br>
                <input type="text" name="lastname" id="inputLastname" class="form-control" placeholder="Lastname" required autofocus>
                <br>
                <select name="role" class="form-control" required autofocus>
                        <option value="Admin">Admin</option>
                        <option value="Member">Member</option>
                </select>
                <br>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <br>
                <input type="password" name="password2" id="inputPasswordagain" class="form-control" placeholder="Re-type Password" required>
                <br>
                <br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Register</button>
                <div class="col-sm-4"></div>
            </form>
        </div>
    </div>
</div>
<footer class="container-fluid text-center">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</footer>
</body>
</html>
