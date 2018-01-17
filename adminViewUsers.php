<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <?Php
    session_start();
    include 'conn.php';
    $usersRetrieval = "SELECT * FROM users WHERE role='Member'";
    $userResult = mysqli_query($conn, $usersRetrieval);
    $adminRetrieval = "SELECT * FROM users WHERE role='Admin'";
    $adminResult = mysqli_query($conn, $adminRetrieval);
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
    </div>
    <div class="col-sm-8 text-left">
        <h1>All Users</h1>
        <hr>
    </div>
    <div class="col-sm-2 sidenav">
    </div>
</div>
<div class="container">
    <h3>Users</h3>
    <hr>
    <div class="row">
            <table id="users">
                <tr>
                    <th>Student ID</th>
                    <th>Student Email</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Info</th>
                    <th>Role</th>
                </tr>
            <?php while ($row = mysqli_fetch_array($userResult)):; ?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[4]; ?></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[7]; ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        <a href="adminEditUser.php"><button>Edit a user</button></a>
    </div>
</div><br>
<div class="container">
    <h3>Admins</h3>
    <hr>
    <div class="row">
        <table id="users">
            <tr>
                <th>Student ID</th>
                <th>Student Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Position</th>
                <th>Role</th>
            </tr>
            <?php while ($row1 = mysqli_fetch_array($adminResult)):; ?>
                <tr>
                    <td><?php echo $row1[0]; ?></td>
                    <td><?php echo $row1[2]; ?></td>
                    <td><?php echo $row1[4]; ?></td>
                    <td><?php echo $row1[5]; ?></td>
                    <td><?php echo $row1[6]; ?></td>
                    <td><?php echo $row1[7]; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div><br>
    </div>
</div><br>





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
