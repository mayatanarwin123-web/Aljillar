<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "video_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

 
    $sql  = "SELECT video_path FROM videos WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row      = $result->fetch_assoc();
        $filePath = $row['video_path'];

      
        if (file_exists($filePath)) {
            unlink($filePath);
        }

   
        $delSql  = "DELETE FROM videos WHERE id=?";
        $delStmt = $conn->prepare($delSql);
        $delStmt->bind_param("i", $id);
        $delStmt->execute();
    }

    
    header("Location: admin_vd_upload.php"); 
    exit();
} else {
    echo "Invalid request!";
}

$conn->close();
?>