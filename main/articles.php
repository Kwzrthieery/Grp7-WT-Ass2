<?php
session_start();

// Function to get user ID from session
function getUserId() {
    if (isset($_SESSION['userID'])) {
        return $_SESSION['userID'];
    } else {
        // You may handle the case where user is not logged in
        return null;
    }
}
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle like button click
    if (isset($_POST["like-btn"])) {
        // Get content id from form data (you'll need to adjust this based on your implementation)
        $contentId = $_POST["content_id"];
        
        // Get user id from session
        $userId = getUserId();
        
        if ($userId) {
            // Insert like into the database
            $sql = "INSERT INTO `like` (contentid, userid) VALUES ($contentId, $userId)";
            if ($conn->query($sql) === TRUE) {
                echo "Like inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "User not logged in.";
        }
    }
    
    // Handle unlike button click
    if (isset($_POST["unlike-btn"])) {
        // Get content id from form data (you'll need to adjust this based on your implementation)
        $contentId = $_POST["content_id"];
        
        // Get user id from session
        $userId = getUserId();
        
        if ($userId) {
            // Insert unlike into the database
            $sql = "INSERT INTO `unlike` (contentid, userid) VALUES ($contentId, $userId)";
            if ($conn->query($sql) === TRUE) {
                echo "Unlike inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "User not logged in.";
        }
    }
    
    // Handle comment submission
    if (isset($_POST["comment"])) {
        // Get content id from form data (you'll need to adjust this based on your implementation)
        $contentId = $_POST["content_id"];
        
        // Get user id from session
        $userId = getUserId();
        
        if ($userId) {
            // Get comment from form data
            $comment = $_POST["comment"];
            
            // Insert comment into the database
            $sql = "INSERT INTO `comment` (contentid, userid, comment) VALUES ($contentId, $userId, '$comment')";
            if ($conn->query($sql) === TRUE) {
                echo "Comment inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "User not logged in.";
        }
    }
    
    // Handle article insertion
    if (isset($_POST["title"]) && isset($_POST["contents"])) {
        // Get the form data
        $title = $_POST["title"];
        $contents = $_POST["contents"];
        $dateofcreation = date("Y-m-d H:i:s"); // Current date and time
        
        // Get user id from session
        $userId = getUserId();
        
        if ($userId) {
            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO article (userid, title, contents, dateofcreation) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("isss", $userId, $title, $contents, $dateofcreation);
            
            // Execute the statement
            if ($stmt->execute()) {
                echo "Article inserted successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }
            
            // Close statement
            $stmt->close();
        } else {
            echo "User not logged in.";
        }
    }
}

// Close connection
$conn->close();
?>
