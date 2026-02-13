<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "video_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql    = "SELECT id, title, video_path FROM videos ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while ($row = $result->fetch_assoc()) {
        echo "<div class='video-item' style='margin-bottom:20px;'>";
        echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
        echo "<video width='300' controls>
                <source src='" . htmlspecialchars($row['video_path']) . "' type='video/mp4'>
              </video><br><br>";

        echo "<a href='update_vd.php?id=" . $row['id'] . "' 
                style='padding:6px 12px; background:#3498db; color:#fff; text-decoration:none; margin-right:10px;'>
                Edit
              </a>";
        echo "<a href='delete_video.php?id=" . $row['id'] . "' 
                style='padding:6px 12px; background:#e74c3c; color:#fff; text-decoration:none;' 
                onclick='return confirm(\"Are you sure you want to delete?\");'>
                Delete
              </a>";
        echo "</div>";
    }
} else {
    echo "No videos uploaded yet.";
}

$conn->close();
?>