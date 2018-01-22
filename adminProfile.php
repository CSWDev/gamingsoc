<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cardiff Metropolitan Gaming Society</title>
    <?Php
    session_start();
    include 'conn.php';
    $sql = "SELECT * FROM contactmessages WHERE status='0'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);


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
                <li><a href="events.php">Events</a></li>
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
    <h2><?php echo $_SESSION['Firstname'] . " " . $_SESSION['Lastname'] . " " . "Account"; ?></h2>
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
            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Messages (<?php echo "$numRows" ?>
                )
            </div>
        </a>
    </div>
    <div id="BasicInfo" class="w3-container detail" style="display:none">
        <div class="container">
            <h2>Account</h2>
            <h4><?php echo "<b>Email Address:</b>" . " " . $_SESSION['Email']; ?></h4>
            <br>
            <h4><?php echo "<b>Firstname:</b>" . " " . $_SESSION['Firstname']; ?></h4>
            <br>
            <h4><?php echo "<b>Lastname:</b>" . " " . $_SESSION['Lastname']; ?></h4>
            <br>
            <h4><?php echo "<b>Role:</b>" . " " . $_SESSION['Role']; ?></h4>
            <br>
            <h4><?php echo "<b>Student ID:</b>" . " " . $_SESSION['StudentID']; ?></h4>
            <br>
            <h4><?php echo "<b>Information:</b>" . " " . $_SESSION['Information']; ?></h4>
            <br>
        </div>
    </div>
    <div id="editInfo" class="w3-container detail" style="display:none">
        <div class="container">

            <div class="col-sm-3">
                <h2>Edit</h2>
                <form action="updateEmailInSession.php" method="post">
                    <div class="form-group">
                        <label for="inputEmail" class="control-label">Edit Email</label>
                        <input type="email" name="inputEmail" id="inputEmail" class="form-control"
                               placeholder="<?php echo $_SESSION['Email']; ?>">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
                <form action="updateFirstnameToSession.php" method="post">
                    <div class="form-group">
                        <label for="inputFirstnm" class="control-label">Edit Firstname</label>
                        <input type="text" name="inputFirstnm" id="inputFirstnm" class="form-control"
                               placeholder="<?php echo $_SESSION['Firstname']; ?>">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
                <form action="updateLastnameToSession.php" method="post">
                    <div class="form-group">
                        <label for="inputLname" class="control-label">Edit Firstname</label>
                        <input type="Text" name="inputLname" id="inputLname" class="form-control"
                               placeholder="<?php echo $_SESSION['Lastname']; ?>">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
                <form class="form-editInfo" method="post" action="addInfoToSession.php">
                    <div class="form-group">
                        <label for="inputEdit" class="control-label">Edit Info</label>
                        <input type="Text" name="inputEdit" id="inputEdit" class="form-control"
                               placeholder="<?php echo $_SESSION['Information']; ?>">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
                <form class="form-editPass" method="post" action="editPassword.php">
                    <div class="form-group">
                        <label for="inputPass" class="control-label">Current Password</label>
                        <input type="password" name="inputPass" id="inputPass" class="form-control"
                               placeholder="Enter current password">
                        <label for="inputPass2" class="control-label">New Password</label>
                        <input type="password" name="inputPass2" id="inputPass2" class="form-control"
                               placeholder="Enter new password">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="Messages" class="w3-container detail" style="display:none">
    <div class="container">
        <h2>Messages</h2>
        <div class="row">
            <table id="users">
                <tr>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                <?php while ($row1 = mysqli_fetch_array($result)):; ?>
                    <tr>
                        <td><?php echo $row1['emailAddr']; ?></td>
                        <td><?php echo $row1['firstname']; ?></td>
                        <td><?php echo $row1['lastname']; ?></td>
                        <td><?php echo $row1['subject']; ?></td>
                        <td><?php echo $row1['message']; ?></td>
                        <td><?php echo $row1['date']; ?></td>
                        <td><?php echo $row1['status']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
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
