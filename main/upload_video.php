<!--NIYITUNGA_FRANCOIS_222004350-->
<?php
// Establish database connection
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
//<!--NIYITUNGA FRANCOIS_222004350-->

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["uploadVideo"])) {
    $userid = 1; // Assuming userid 1 for now, replace it with actual user id
    $type = "video"; // Set type to "video" for video uploads
    $upload_date = date("Y-m-d H:i:s"); // Current datetime

    // File upload path
    $targetDir = "multimedia/video/";
    $fileName = basename($_FILES["uploadVideo"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('mp4', 'avi', 'mov', 'wmv');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["uploadVideo"]["tmp_name"], $targetFilePath)) {
            // Insert video file details into database
            $sql = "INSERT INTO multimedia (userid, type, location, upload_date) VALUES ('$userid', '$type', '$targetFilePath', '$upload_date')";
            if ($conn->query($sql) === TRUE) {
                echo "File uploaded successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo 'Only MP4, AVI, MOV, WMV files are allowed to upload.';
    }
}
?>
