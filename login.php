<?php
// Check if username and password are set and not empty
if(isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    // Sanitize user input to prevent SQL Injection
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Your database connection code
    $servername = "localhost";
    $db_username = "admin";
    $db_password = "bityear2@2024";
    $dbname = "bityeartwo2024";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query to fetch user from database
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: main/index.html");
        exit();
        // echo "<a href='main/index.html'>Login successful></a>";
    } else {
        // User not found or invalid credentials
        echo "Invalid username or password";
    }

    // Close database connection
    $conn->close();
} else {
    // Username or password not provided
    echo "Please provide both username and password";
}
?>
