<?php
$servername = "localhost";
$username   = "root" ;
$password   = "";
$dbname     = "video_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data exist
if (isset($_POST['title']) && isset($_FILES['video'])) {
    $title = $_POST['title'];

    // Upload folder
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Generate unique file name
    $fileName        = time() . "_" . basename($_FILES["video"]["name"]);
    $targetFilePath  = $targetDir . $fileName;

    // Move uploaded file to server
    if (move_uploaded_file($_FILES["video"]["tmp_name"], $targetFilePath)) {
        // Insert DB record
        $sql  = "INSERT INTO videos (title, video_path) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $title, $targetFilePath);

        if ($stmt->execute()) {
            echo "Video uploaded successfully!";
        } else {
            echo "Database Error: " . $conn->error;
        }
    } else {
        echo "File upload failed!";
    }
} else {
    echo "No data received!";
}

$conn->close();
?>