<!-- kwizera thierry -->
<!-- 222003408 -->
<?php
session_start(); // Start the session

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
        // Fetch the user row
        $user_row = $result->fetch_assoc();

        // Extract first name and last name from the fetched row
        $username = $user_row['username'];

        // Store the full name in session for later use
        $_SESSION['username'] = $username;

        // Redirect to main/index.php with welcome message
        header("Location: main/index.php?welcome=" . urlencode("Welcome, $username"));
        exit();
    } else {
        // User not found or invalid credentials
        echo "Invalid Username or Password";
    }
} else {
    // Username or password not provided
    echo "Please provide both username and password";
}
?>
