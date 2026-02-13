<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "video_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM videos ORDER BY uploaded_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Watch Videos</title>
    <style>
        body { font-family: Arial, sans-serif; 
            text-align: center; 
            margin-top: 20px;
            width: 100%;
            height: 100%;
            overflow: hidden;
        
        }
        .video-container { width: 80%; margin: auto; display: flex; flex-wrap: wrap; justify-content: center; }
        .video { margin: 10px; padding: 10px; border: 1px solid #ddd; border-radius: 10px; background: #f9f9f9; width: 300px; }
        video { width: 100%; border-radius: 10px; }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .video-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; 
            z-index: -1;
        }
    </style>
</head>
<body>
<video class="video-bg" autoplay muted loop>
        <source src="Babyvd.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>




    <h2>Uploaded Videos</h2>
    <div class="video-container">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="video">
                <h4><?= htmlspecialchars($row['title']) ?></h4>
                <video controls>
                    <source src="<?= htmlspecialchars($row['video_path']) ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>

