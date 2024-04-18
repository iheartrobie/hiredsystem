<?php
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    include("connection.php");
    $query = "SELECT Email, loginID FROM login_tbl WHERE Email='$email'";
    $result = mysqli_query($connections, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $loginID = $row['loginID'];
    } else {
        $email = "N/A"; 
    }
} else {
    echo "error";
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
    <div class="admin-container">

        <nav class="vert-nav"><!--VERTICAL NAVIGATION BAR-->
            <div class="nav-header">
                <center><h1>LOGO</h1><br><br><br>
                <h3><?php echo $email; ?></h3>
                <h3><?php echo "ID: " .$loginID; ?></h3><br><br><br></center>
            </div>
            <a href="#">
                <img src="icons/Dashboard.png" alt="dashboard-icon">
                    &nbsp;Dashboard
                </a><br>
            <a href="#">
                <img src="icons/Profile.png" alt="profile-icon">
                    &nbsp;Profile
            </a><br>
            <a href="#">
                <img src="icons/Employees.png" alt="employee-icon">
                    &nbsp;Employees
            </a><br>
            <a href="#">
                <img src="icons/Pendings.png" alt="pendings-icon">
                    &nbsp;Pendings
            </a><br>
            <a href="#">
                <img src="icons/Rules.png" alt="rules-icon">
                    &nbsp;Rules
            </a><br><br>
            <a href="#" class="logout">
                <img src="icons/Log out.png" alt="logout-icon">
                    &nbsp;Log-Out
            </a><br>
        </nav>

        <section class="main-contents">

        <nav class="horz-nav">
                <img src="icons/Dashboard Icon.png" alt="horizontal-dashboard-icon">
                    <h2>NEW HIRED ON BOARD SYSTEM</h2>  
                <img src="icons/adminprofile.png" alt="admin-profile-pic" class="adminprofile">
        </nav>
        

        </section>

    </div>
<script src="admindom.js"></script>
</body>
</html>