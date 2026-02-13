<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Admin - Upload Video</title>
    <style>
        input, button { margin: 10px 0;
             padding: 10px; }
    
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}


.modal-content {
    background-color: white;
    margin: 15% auto;
    padding: 20px;
    width: 30%;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
}



.close {
    float: right;
    font-size: 20px;
    cursor: pointer;
}
   .video-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 20px;
}

.video-item {
    flex: 1 1 calc(33.33% - 20px); /* 3 Columns */
    max-width: calc(33.33% - 20px); 
    background: rgba(255, 255, 255, 0.9);
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.video-item video {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.video-title {
    font-size: 16px;
    font-weight: bold;
    margin-top: 5px;
    color: #333;
    text-align: center;
}

/* Responsive Layout */
@media (max-width: 1024px) {
    .video-item {
        flex: 1 1 calc(50% - 20px); /* 2 Columns for tablets */
        max-width: calc(50% - 20px);
    }
}

@media (max-width: 768px) {
    .video-item {
        flex: 1 1 100%; /* 1 Column for mobile */
        max-width: 100%;
    }
}

/*---Video box----*/
.details {
    position: relative;
    width: 80%;
    padding: 20px;
    display: grid;
    grid-gap: 5px;
    margin-left: auto; /* Right align */
    margin-right: 0;
}

 .details .table-list{
    
    position: relative;
    display: grid;
    min-height: 200px;
    background: var(--white);
    padding: 20px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
    border-radius: 20px;
    margin-top:10px;

 }

 .details .cardHeader {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;

 }
.details table{
    width: 100%;
    margin: 50px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.details table th, .details table td{
  border-bottom: 1px solid #ddd;
  padding:12px;
  text-align:left;
}
.details table thead{
    background-color: #6d41dc;
    color: white;
    text-transform: uppercase;
}
.details .table-list table tr{
    color: black;
    border-bottom: 1px solid rgba(0,0,0,0.1);
}
.details .table-list table tr td .edit{
    background-color: #28A745;
    border-radius: 5px;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
}
.details .table-list table tr td .edit i{
    margin: 0 .5rem 0 0;
}
.details .table-list table tr td .delete{
    background-color: #E74C3C;
    border-radius: 5px;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    margin-left: 10px;
}
.details .table-list table tr td .delete i{
    margin: 0 .5rem 0 0;
}

    </style>
</head>
<body>
<div class="sidebar">
        <h2>Admin <span>Dashboard</span></h2>
        <div class="profile">
            <img src="children.avif" alt="Admin">
            <p>@admin</p>
        </div>
        <ul class="sidebar1">
            <li><i class="fa-solid fa-user-tie"></i> <a href="dashboard.php">&nbsp;&nbsp;Dashboard</a></li>
            <li><i class="fa fa-users"></i><a href="userlist.php">&nbsp;&nbsp;Users List</a></li>
            <li><i class="fa fa-plus"></i><a href="lessonadmin.php">&nbsp;&nbsp;Lesson</a></li>
            <li><i class="fa fa-tasks"></i><a href="">&nbsp;&nbsp;Result List</a></li>
            <li><i class="fa fa-plus"></i><a href="admin_vd_upload.php">&nbsp;&nbsp;Video List</a></li>
            <li><i class="fa fa-sign-out-alt"></i><a href="">&nbsp;&nbsp;Logout</a></li>
        </ul>
    </div> 




    <div class="details">
    <div class="table-list">
        <div class="btn">
            <button id="openModalBtn">Add Video</button>
        </div>
 

    <div id="uploadModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="upload_video.php" method="POST" enctype="multipart/form-data">
                <h2>Upload Video</h2>
                <input type="text" name="title" placeholder="Video Title" required><br>
                <input type="file" name="video" accept="video/*" required><br>
                <button type="submit">Upload</button>
            </form>
        </div>
    </div> 
     <!-- Uploaded Videos Section -->
    <h2>Uploaded Videos</h2>
    <div class="video-container" id="videoList"></div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let modal = document.getElementById("uploadModal");
        let openBtn = document.getElementById("openModalBtn");
        let closeBtn = document.querySelector(".close");

        openBtn.addEventListener("click", function() {
            modal.style.display = "block";
        });

        closeBtn.addEventListener("click", function() {
            modal.style.display = "none";
        });

        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });

        // Fetch videos and display
        fetch('get_videos.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById("videoList").innerHTML = data;
            });
    });
</script>



</body>
</html>
<?php
