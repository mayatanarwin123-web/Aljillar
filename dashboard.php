<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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

        <div class="dashboard">
            <div class="box"><i class="fa fa-users"></i> <p>3 Employee</p></div>
            <div class="box"><i class="fa fa-tasks"></i> <p>15 All Tasks</p></div>
            <div class="box"><i class="fa fa-exclamation-triangle"></i> <p>5 Overdue</p></div>
            <div class="box"><i class="fa fa-clock"></i> <p>1 No Deadline</p></div>
            <div class="box"><i class="fa fa-calendar-day"></i> <p>2 Due Today</p></div>
            <div class="box"><i class="fa fa-bell"></i> <p>5 Notifications</p></div>
            <div class="box"><i class="fa fa-spinner"></i> <p>13 Pending</p></div>
            <div class="box"><i class="fa fa-sync-alt"></i> <p>1 In Progress</p></div>
            <div class="box"><i class="fa fa-check"></i> <p>1 Completed</p></div>
        </div>
    </div>

</body>
</html>