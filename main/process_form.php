<!-- Kwizera thierry -->
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

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $userID = $_POST['userid'];
    $campus = $_POST['campus'];
    $college = $_POST['college'];
    $department = $_POST['department'];
    $level = $_POST['level'];
    $group = $_POST['group'];
    $school = $_POST['school'];
    $regnumber = $_POST['regnumber'];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO profile (userid, Campus, College, Department, Level, `Group`, School, Regnumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssss", $userID, $campus, $college, $department, $level, $group, $school, $regnumber);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Handle the case where the user is not logged in
    // You can redirect the user to the login page or display a message
    header("Location: login.php");
    exit();
}
?>