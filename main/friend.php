<!-- Shema christian_222005490 -->
<?php
// Assuming you have already connected to your database
// Replace these placeholders with your actual database connection code
$servername = "localhost";
$username = "admin";
$password = "bityear2@2024";
$dbname = "bityeartwo2024";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT f.fid, CONCAT(u1.firstname, ' ', u1.lastname) AS user_name, CONCAT(u2.firstname, ' ', u2.lastname) AS friend_name 
        FROM friends f
        INNER JOIN user u1 ON f.userid = u1.id
        INNER JOIN user u2 ON f.friendid = u2.id";

$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tables-Friends</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Add your custom CSS styles here */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body style="background-color: #f0f0f0;">
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
                                            <li><a class="dropdown-item" href="friend.html">Friend Form</a></li>
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
                                            <li><a class="dropdown-item" href="#" id="profilebtn">Profile</a></li>
                                            <li><a class="dropdown-item" href="#" id="logoutBtn">Logout</a></li>
                                        </ul>
                                    </li>
                                    <li> 
                                        <!-- <div class="col-3 offset">
                                            <div class="well" id="welcomeMessage" action="login.php">
                                            </div>
                                        </div> -->
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
        <table>
            <thead>
                <tr>
                    <th>FID</th>
                    <th>User</th>
                    <th>Friend</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["fid"] . "</td>";
                        echo "<td>" . $row["user_name"] . "</td>";
                        echo "<td>" . $row["friend_name"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
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

<?php
$conn->close();
?>
