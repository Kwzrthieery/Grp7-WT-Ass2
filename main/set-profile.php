<!-- kwizera thierry -->
<!-- 222003408 -->
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $campus = $_POST['campus'];
    $college = $_POST['college'];
    $school = $_POST['school'];
    $department = $_POST['department'];
    $level = $_POST['level'];
    $group = $_POST['group'];
    $regnumber = $_POST['regnumber'];

    // Check if any of the form fields are empty
    if (empty($campus) || empty($college) || empty($school) || empty($department) || empty($level) || empty($group) || empty($regnumber)) {
        echo "Please fill in all fields.";
    } else {
        // Prepare update statement
        $sql = "UPDATE profile SET Campus=?, College=?, School=?, Department=?, Level=?, Group=?, Regnumber=? WHERE userid=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $campus, $college, $school, $department, $level, $group, $regnumber, $userID);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Profile updated successfully.";
        } else {
            echo "Error updating profile: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Settings-profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="./css/basicstyle.css"> -->

    <style>
        .navbar {
            background-color: white !important;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }

        .form {
            max-width: 600px; /* Adjust the maximum width */
            padding: 20px;
            border: 2px solid #007bff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.8);
        }

        .form-title {
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 20px;
        }

        .form-label {
            width: 150px; /* Fixed width for labels */
        }

        .form-control {
            width: calc(100% - 160px); /* Adjust width of form controls */
            display: inline-block;
        }

        .form-group {
            display: inline-block;
            margin-right: 20px; /* Spacing between form elements */
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
    <div class="form-container">
        <div class="form">
            <h1 class="form-title">Profile</h1>
            <form action="save_profile.php" method="post">
                <?php
                // Database connection
                $servername = "localhost";
                $db_username = "admin";
                $db_password = "bityear2@2024";
                $dbname = "bityeartwo2024";

                $conn = new mysqli($servername, $db_username, $db_password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch data from the profile table
                $sql = "SELECT * FROM profile WHERE userid = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $userID);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="form-group">
                            <label for="campus" class="form-label">Campus</label>
                            <input type="text" class="form-control" id="campus" name="campus" value="<?php echo $row['Campus']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="college" class="form-label">College</label>
                            <input type="text" class="form-control" id="college" name="college" value="<?php echo $row['College']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="school" class="form-label">School</label>
                            <input type="text" class="form-control" id="school" name="school" value="<?php echo $row['School']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" class="form-control" id="department" name="department" value="<?php echo $row['Department']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="level" class="form-label">Level</label>
                            <input type="text" class="form-control" id="level" name="level" value="<?php echo $row['Level']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="group" class="form-label">Group</label>
                            <input type="text" class="form-control" id="group" name="group" value="<?php echo $row['Group']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="regnumber" class="form-label">Registration Number</label>
                            <input type="text" class="form-control" id="regnumber" name="regnumber" value="<?php echo $row['Regnumber']; ?>" readonly>
                        </div>
                <?php
                    }
                } else {
                    // Show popup to complete profile
                    echo '<div class="popup"><button type="submit" class="btn btn-primary">Complete your profile</button></div>';
                    // Redirect to profile.php when the popup is clicked
                    echo '<script>document.querySelector(".popup").addEventListener("click", function() { window.location.href = "profile.php"; });</script>';
                }
                $conn->close();
                ?>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
