<?php
// Database connection parameters
$servername = "localhost";
$username = "admin"; // Change this to your database username
$password = "bityear2@2024"; // Change this to your database password
$dbname = "bityeartwo2024"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $title = $_POST["title"];
    $contents = $_POST["contents"];
    $dateofcreation = date("Y-m-d H:i:s"); // Current date and time

    // You may need to get the user ID from the session or wherever you store it
    $userid = 1; // Change this to the actual user ID

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO article (userid, title, contents, dateofcreation) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $userid, $title, $contents, $dateofcreation);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Article inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
