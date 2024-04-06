<!-- Kwizera Thierry -->
<!-- 222003408 -->
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
    $sql1 = "SELECT firstname FROM user WHERE username='$username' AND password='$password'";
    $sql2 = "SELECT lastname FROM user WHERE username='$username' AND password='$password'";

    $firstname_query = $conn->query($sql1);
    $lastname_query = $conn->query($sql2);

    // Fetch the actual values from the query results
    $firstname_row = $firstname_query->fetch_assoc();
    $lastname_row = $lastname_query->fetch_assoc();

    // Extract first name and last name from the fetched rows
    $firstname = $firstname_row['firstname'];
    $lastname = $lastname_row['lastname'];

    // Concatenate first name and last name to form the full name
    $fullname = $firstname . " " . $lastname;
    header("Location: main/index.php");
    exit();
}
} else {
    // User not found or invalid credentials
    echo "Invalid Username or Password";
}
?>
