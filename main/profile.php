<?php
session_start(); // Start the session

// Check if the user is logged in and their userID is set
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
    } else {
        // Handle the case where the user ID couldn't be retrieved
        // You can redirect the user to an error page or display a message
        echo "Error: Unable to fetch user ID.";
        exit(); // Stop further execution
    }
} else {
    // Handle the case where the user is not logged in
    // You can redirect the user to the login page or display a message
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="./css/basicstyle.css"> -->

    <style>
        .navbar-nav .nav-item.active {
            font-weight: bold;
        }

        .form-check-label {
            margin-right: 1em;
        }

        /* Custom styles for the form */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh; /* Adjust the height as needed */
        }

        .form {
            max-width: 600px;
            text-align: center;
            padding: 20px;
            border: 2px solid #007bff; /* Border color */
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 0.5em;
        }

        /* Adjust dropdown menu */
        .navbar-nav .dropdown-menu {
            margin-top: 0;
        }

        .navbar-nav .dropdown-menu .dropdown-item {
            padding: 0.5rem 1rem;
        }

        .navbar-nav .dropdown-menu .dropdown-item:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body style="background-color: white;">
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

                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="form-container">
            <div class="form">
                <h1>Profile Form</h1>
                <form action="process_form.php" method="post"> <!-- Pointing to the PHP script -->
                    <div class="form-row">
                    <div>
                        <label for="userid" class="form-label">User ID</label>
                        <input type="text" class="form-control" id="userid" name="userid" placeholder="Enter your user ID" value="<?php echo htmlspecialchars($userID); ?>" readonly>
                    </div>
                        <div>
                            <label for="school" class="form-label">School</label>
                            <input type="text" class="form-control" id="school" name="school" placeholder="Enter school name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div>
                            <label for="campus" class="form-label">Campus</label>
                            <input type="text" class="form-control" id="campus" name="campus" placeholder="Enter campus name">
                        </div>
                        <div>
                            <label for="college" class="form-label">College</label>
                            <input type="text" class="form-control" id="college" name="college" placeholder="Enter college name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div>
                            <label for="department" class="form-label">Department</label>
                            <input type="text" class="form-control" id="department" name="department" placeholder="Enter department">
                        </div>
                        <div>
                            <label for="level" class="form-label">Level</label>
                            <input type="text" class="form-control" id="level" name="level" placeholder="Enter level">
                        </div>
                    </div>
                    <div class="form-row">
                        <div>
                            <label for="group" class="form-label">Group</label>
                            <input type="text" class="form-control" id="group" name="group" placeholder="Enter group">
                        </div>
                        <div>
                            <label for="regnumber" class="form-label">Registration Number</label>
                            <input type="text" class="form-control" id="regnumber" name="regnumber" placeholder="Enter registration number">
                        </div>
                    </div>
                    <div class="submit-btn mt-3">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Your JavaScript code here
    </script>
</body>

</html>
