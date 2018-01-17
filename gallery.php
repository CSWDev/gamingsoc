<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gallery</title>
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
                ?>            </ul>
        </div>
    </div>
</nav>
<br>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
        </div>
        <div class="col-sm-8 text-left">
            <h1>Gallery</h1>
            <hr>
        </div>
        <div class="col-sm-2 sidenav">
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-4">

            <div class="panel panel-primary">

                <div class="panel-body"><img src="images/firstSocialTSG.jpg" class="img-responsive" style="width:100%" alt="Image"></div>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">

                <div class="panel-body"><img src="images/csgoCompTeam.jpg" class="img-responsive" style="width:100%" alt="Image"></div>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">

                <div class="panel-body"><img src="images/freshersGang.jpg" class="img-responsive" style="width:100%" alt="Image"></div>

            </div>
        </div>
    </div>
</div><br>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-primary">

                <div class="panel-body"><img src="images/bakesale.jpg" class="img-responsive" style="width:100%" alt="Image"></div>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">

                <div class="panel-body"><img src="images/firstSocialTSG2.jpg" class="img-responsive" style="width:100%" alt="Image"></div>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">

                <div class="panel-body"><img src="images/firstSocialTSG3.jpg" class="img-responsive" style="width:100%" alt="Image"></div>

        </div>
        </div>
    </div>
</div><br><br>

<footer class="container-fluid text-center">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</footer>

</body>
</html>
