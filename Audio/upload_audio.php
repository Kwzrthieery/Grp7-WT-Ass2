<!--Nsengiyumva edouard,222001639-->
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
//<!--Nsengiyumva edouard,222001639-->

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["uploadAudio"])) {
    $userid = 1; // Assuming userid 1 for now, replace it with actual user id
    $type = "audio"; // Set type to "audio" for audio uploads
    $upload_date = date("Y-m-d H:i:s"); // Current datetime

    // File upload path
    $targetDir = "multimedia/audio/";
    $fileName = basename($_FILES["uploadAudio"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('mp3', 'ogg', 'wav');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["uploadAudio"]["tmp_name"], $targetFilePath)) {
            // Insert audio file details into database
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
        echo 'Only MP3, OGG, WAV files are allowed to upload.';
    }
}
?>
