<!-- Kwizera thierry -->
<!-- 222003408 -->
<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f0f0;
        }
        a {
            text-decoration: none;
        }
        .card {
            position: relative;
            border-radius: 36px;
            overflow: hidden;
            margin-bottom: 20px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }
        .icon {
            font-size: 80px;
            margin-top: 20px;
        }
        .icon-text {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    
<div class="container"><!--check more that can be added on the content-->
        <div class="row">
            <div class="col-auto">
                <div class="box">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">BIT 2 HUYE</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.html">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.html">Contact</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Tables
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="user.php">User Table</a></li>
                                            <li><a class="dropdown-item" href="comment.php">Comment Table</a></li>
                                            <li><a class="dropdown-item" href="friend.php">Friend Table</a></li>
                                            <li><a class="dropdown-item" href="like.php">Like Table</a></li>
                                            <li><a class="dropdown-item" href="unlike.php">UnLike Table</a></li>
                                        </ul>
                                    </li>
                                         <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Forms
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="friends.php">Friend Form</a></li>
                                            <li><a class="dropdown-item" href="profile.php">Profile Form</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="list.html">List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="image.html">Images</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="audio.html">Audio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="video.html">Video</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="articles.html">Articles</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Settings
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="set-profile.php" id="profilebtn">Profile</a></li>
                                            <li><a class="dropdown-item" href="#" id="logoutBtn">Logout</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item" style="margin-left: 40px; font-style: bold;">
                                        <?php
                                        if(isset($_SESSION['username'])) {
                                            $username = $_SESSION['username'];
                                            $servername = "localhost";
                                            $db_username = "admin";
                                            $db_password = "bityear2@2024";
                                            $dbname = "bityeartwo2024";

                                            $conn = new mysqli($servername, $db_username, $db_password, $dbname);

                                            $sql = "SELECT id FROM user WHERE username = '$username'";
                                            $result = $conn->query($sql);

                                            // Check if the query was successful
                                            if ($result && mysqli_num_rows($result) > 0) {
                                                // Fetch the user ID
                                                 $row = mysqli_fetch_assoc($result);
                                                 $userID = $row['id'];
                                                 echo "<span class='nav-link'>Hello $username</span>";
                                            } else {
                                            // Handle the case where the user ID couldn't be retrieved
                                            // You can redirect the user to an error page or display a message
                                            echo "Error: Unable to fetch user ID.";
                                             exit(); // Stop further execution
                                         }
                                        }
                                        ?>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5">
                    <a href="image.html">
                    <div class="card">
                        <img src="multimedia/icons/i.png" alt="Image" class="multimedia-image">
                        <div class="icon-text">Image</div>
                    </div>
                    </a>
                </div>
                <div class="col-md-5">
                    <a href="audio.html">
                    <div class="card">
                        <img src="multimedia/icons/au.png" alt="Audio" class="multimedia-image">
                        <div class="icon-text">Audio</div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <a href="video.html">
                    <div class="card">
                        <img src="multimedia/icons/v.png" alt="Video" class="multimedia-image">
                        <div class="icon-text">Video</div>
                    </div>
                    </a>
                </div>
                <div class="col-md-5">
                    <a href="articles.html">
                    <div class="card">
                        <img src="multimedia/icons/ar.png" alt="Article" class="multimedia-image">
                        <div class="icon-text">Article</div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmLogoutBtn">Logout</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Success Modal -->
    <div class="modal fade" id="logoutSuccessModal" tabindex="-1" aria-labelledby="logoutSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutSuccessModalLabel">Logout Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You have been logged out successfully.
                </div>
                <div class="modal-footer">
                    <a href="home.html" class="btn btn-primary">OK</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('logoutBtn').addEventListener('click', function() {
                $('#logoutModal').modal('show');
            });

            document.getElementById('confirmLogoutBtn').addEventListener('click', function() {
                $('#logoutModal').modal('hide');
                $('#logoutSuccessModal').modal('show');
                setTimeout(function() {
                    window.location.href = '../index.html';
                }, 2000);
            });
        });
    </script>
</body>
</html>
