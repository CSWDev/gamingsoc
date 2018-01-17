<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact</title>
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
                <li class="active"><a href="#">Contact</a></li>
                <li><a href="gallery.php">Gallery</a></li>
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
<div class="container">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
        <div class="card card-container">
            <div class="col-sm-3"></div>
            <h1>Contact Us</h1>
            <br>
            <form class="form-contact" action="contactHandler.php" method="post" >
                <span id="reauth-email" class="reauth-email"></span>
                <br>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <br>
                <input type="text" name="firstname" id="inputFname" class="form-control" placeholder="Firstname" required autofocus>
                <br>
                <input type="text" name="lastname" id="inputLname" class="form-control" placeholder="Lastname" required autofocus>
                <br>
                <input type="text" name="subject" id="inputSubject" class="form-control" placeholder="Subject" required autofocus>
                <br>
                <textarea name="Message" cols="74" rows="5" placeholder="Enter Message Here!" required autofocus></textarea>
                <br>
                <button class="btn btn-lg btn-primary btn-block btn-contact" type="submit" value="Send" onclick="myFunction()">Send</button>
                <div id="snackbar">Message successfully sent!</div>
            </form><!-- /form -->
            <hr>
    </div><!-- /card-container -->
</div><!-- /container -->
<footer class="container-fluid text-center">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</footer>
    <script>
        function myFunction() {
            var x = document.getElementById("snackbar")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>
</body>
</html>
