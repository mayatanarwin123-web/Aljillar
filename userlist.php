<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Users List</title>
    <style>

.container {
    width: 90%;
    background: white;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    position: relative;
    width: 80%;
    padding: 20px;
    display: grid;
    grid-gap: 5px;
    margin-left: auto; /* Right align */
    margin-right: 0;
}

/* Header */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 10px;
}

header h2 {
    margin: 0;
}

.breadcrumb {
    font-size: 14px;
    color: gray;
}


/* Search Box */
.search-box {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #e9eff4;
    padding: 10px;
    border-radius: 5px;
    margin-top: 15px;
}

.search-box input {
    flex: 1;
    padding: 8px;
    border: none;
    border-radius: 4px;
    outline: none;
}

.buttons button {
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}


/* Results */
.results {
    margin-top: 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.results select {
    padding: 5px;
    border-radius: 5px;
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

thead {
    background-color: #007bff;
    color: white;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.avatar {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin-right: 10px;
    vertical-align: middle;
}

/* Locked Badge */
.locked {
    background-color: red;
    color: white;
    padding: 3px 6px;
    border-radius: 3px;
    font-size: 12px;
}

/* Buttons */
button {
    cursor: pointer;
    border: none;
    padding: 6px 10px;
    border-radius: 4px;
}

.unlock-btn {
    background-color: green;
    color: white;
}

.lock-btn {
    background-color: red;
    color: white;
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

    <div class="main-content">
       

        <div class="container">
        <header>
            <h2>Users</h2>
            <div class="breadcrumb">Home / Users</div>
           
        </header>
        <div class="results">
            <label>Results User Account page:</label>
           
          <?php echo date("Y-m-d"); ?>
        </div><br>

    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        </thead>
            <tbody>
            <?php
        require 'db.php';

        $query = "SELECT * FROM users";
        $rows = mysqli_query($con, $query);
        $i = 1;

        while ($result = mysqli_fetch_assoc($rows)) {
        ?>
            <tr>
            
                <td><?= $i++; ?></td>
                <td><?= $result['Name']; ?></td>
                <td><?= $result['Email']; ?></td>
                <td><?= $result['Role']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    </div>

</body>
</html>