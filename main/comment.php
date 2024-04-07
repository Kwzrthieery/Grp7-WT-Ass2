<!-- Shema christian_222005490 -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All In One BIT 2024</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        tr:nth-child(even) {
            background-color: #dcdcdc;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }
    </style>
</head>

<body style="background-color: #f0f0f0;">
    <!-- Setting background image -->
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
                                            <li><a class="dropdown-item" href="multimedia.html">Multimedia Form</a></li>
                                            <li><a class="dropdown-item" href="article.html">Article Form</a></li>
                                            <li><a class="dropdown-item" href="comment.html">Comment Form</a></li>
                                            <li><a class="dropdown-item" href="friend.html">Friend Form</a></li>
                                            <li><a class="dropdown-item" href="like.html">Like Form</a></li>
                                            <li><a class="dropdown-item" href="unlike.html">UnLike Form</a></li>
                                            <li><a class="dropdown-item" href="role.html">Role Form</a></li>
                                            <li><a class="dropdown-item" href="profile.html">Profile Form</a></li>
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

    <div class="container mt-4">
        <table>
            <thead>
                <tr>
                    <th>Comment ID</th>
                    <th>Article Title</th>
                    <th>User Name</th>
                    <th>Comment Content</th>
                    <th>Date of Creation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $servername = "localhost";
                $username = "admin";
                $password = "bityear2@2024";
                $dbname = "bityeartwo2024";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // SQL query to fetch data
                $sql = "SELECT comment.cid, article.title, CONCAT(user.firstname, ' ', user.lastname) AS username, article.contents, article.dateofcreation 
                        FROM comment 
                        INNER JOIN article ON comment.contentid = article.artid 
                        INNER JOIN user ON comment.userid = user.id";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["cid"] . "</td>
                                <td>" . $row["title"] . "</td>
                                <td>" . $row["username"] . "</td>
                                <td>" . $row["contents"] . "</td>
                                <td>" . $row["dateofcreation"] . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No comments found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script>
        document.getElementById('logoutBtn').addEventListener('click', function() {
            $('#logoutModal').modal('show');
        });

        document.getElementById('confirmLogoutBtn').addEventListener('click', function() {
            $('#logoutModal').modal('hide');
            setTimeout(function() {
                window.location.href = '../index.html';
            }, 1000);
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>
