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

// Fetching values from the form
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$password = $_POST['password'];

// Inserting data into database
$sql = "INSERT INTO user (firstname, lastname, username, email, telephone, password)
        VALUES ('$firstname', '$lastname', '$username', '$email', '$telephone', '$password')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../login/login page/main/index.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
