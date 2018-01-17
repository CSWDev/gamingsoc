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
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="signOut.php">Logout</a></li>
                    <?php
                }
                ?>            </ul>
        </div>
    </div>
</nav>
<br>
<div class="container">
    <h2><?php echo  $_SESSION['Firstname']. " ". $_SESSION['Lastname']. " " . "Account"; ?></h2>
    <br>
    <br>
    <div class="w3-row">
        <a href="javascript:void(0)" onclick="openDetail(event, 'BasicInfo');">
            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Account</div>
        </a>
        <a href="javascript:void(0)" onclick="openDetail(event, 'editInfo');">
            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Edit Information</div>
        </a>
        <a href="javascript:void(0)" onclick="openDetail(event, 'Messages');">
            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Messages</div>
        </a>
    </div>
    <div id="BasicInfo" class="w3-container detail" style="display:none">
        <h2>Account</h2>
        <h4><?php echo "<b>Email Address:</b>". " ". $_SESSION['Email'];?></h4>
        <br>
        <h4><?php echo "<b>Firstname:</b>". " ". $_SESSION['Firstname'];?></h4>
        <br>
        <h4><?php echo "<b>Lastname:</b>". " ". $_SESSION['Lastname'];?></h4>
        <br>
        <h4><?php echo "<b>Role:</b>". " ". $_SESSION['Role'];?></h4>
        <br>
        <h4><?php echo "<b>Student ID:</b>". " ". $_SESSION['StudentID'];?></h4>
        <br>
        <h4><?php echo "<b>Information:</b>". " ". $_SESSION['Information'];?></h4>
    </div>
    <div id="editInfo" class="w3-container detail" style="display:none">
        <div class="col-sm-3">
        <h2>Edit</h2>
            <form class="form-editEmail" method="post" action="updateEmailInSession.php">
                <h4>Edit Email</h4><input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="<?php echo $_SESSION['Email']; ?>" ><button>Edit</button>
            </form>
            <form class="form-editFirstnm" method="post" action="updateFirstnameToSession.php">
                <h4>Firstname:</h4><input type="text" name="firstname" id="inputFname" class="form-control" placeholder="<?php echo $_SESSION['Firstname']; ?>" required><button>Update</button>
            </form>
            <form class="form-editLastnm" method="post" action="updateLastnameToSession.php">
                <h4>Lastname</h4><input type="text" name="lastname" id="inputLname" class="form-control" placeholder="<?php echo $_SESSION['Lastname']; ?>" required><button>Update</button>
            </form>
            <form class="form-editInfo" method="post" action="addInfoToSession.php">
                <h4>Information about you</h4><input type="text" name="inputInfo" id="inputInfo" class="form-control" placeholder="" ><button>Add</button>
            </form>
        </div>
    </div>
    <div id="Messages" class="w3-container detail" style="display: none">
        <h2>Messages</h2>
    </div>
</div>
<footer class="container-fluid text-center">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script>
        function openDetail(evt, BasicInfo) {
            var i, x, tablinks;
            x = document.getElementsByClassName("detail");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
            }
            document.getElementById(BasicInfo).style.display = "block";
            evt.currentTarget.firstElementChild.className += " w3-border-red";
        }
    </script>
</footer>
</body>
