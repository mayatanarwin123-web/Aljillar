<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "video_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


    $id    = $_POST['id'];
    $title = $_POST['title'];

   
    if (isset($_FILES['video']) && $_FILES['video']['name'] != "") {
        
        $oldSql = "SELECT video_path FROM videos WHERE id=?";
        $oldStmt = $conn->prepare($oldSql);
        $oldStmt->bind_param("i", $id);
        $oldStmt->execute();
        $oldResult = $oldStmt->get_result();
        if ($oldResult->num_rows > 0) {
            $oldRow = $oldResult->fetch_assoc();
            $oldFilePath = $oldRow['video_path'];
           
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

       
        $targetDir = "uploads/"; 
        $fileName  = time() . "_" . basename($_FILES["video"]["name"]); 
        $targetFilePath = $targetDir . $fileName;

        move_uploaded_file($_FILES["video"]["tmp_name"], $targetFilePath);

        $sql  = "UPDATE videos SET title=?, video_path=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $title, $targetFilePath, $id);
        $stmt->execute();
    } else {
       
        $sql  = "UPDATE videos SET title=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $title, $id);
        $stmt->execute();
    }

    header("Location: admin_vd_upload.php"); 
    exit();


// 3) If form not submitted => Show edit form
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch current data
    $sql  = "SELECT * FROM videos WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!-- HTML Form for Edit -->
        <h2>Edit Video</h2>
        <form action="update_vd.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label>Video Title:</label><br>
            <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required><br><br>

            <label>Current Video:</label><br>
            <video width="300" controls>
                <source src="<?php echo htmlspecialchars($row['video_path']); ?>" type="video/mp4">
            </video><br><br>

            <label>Upload New Video (Optional):</label><br>
            <input type="file" name="video" accept="video/*"><br><br>

            <button type="submit" name="update">Update</button>
        </form>
        <?php
    } else {
        echo "Video not found!";
    }
} else {
    echo "Invalid Request!";
}

$conn->close();
?>