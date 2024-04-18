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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="dashboard.css">
    <title>ADMIN PANEL</title>
</head>

<body>
    <nav>
        <div class="logo">
            <h1>LOGO</h1>
        </div>

        <div class="email">
            <h2><?php echo $email; ?></h2>
            <h3><?php echo "ID: " .$loginID; ?></h3>
        </div>
       
        <ul>  
            <li>
                <img src="icons/Dashboard.png" alt="">
                <a href=""> Dashboard </a>
            </li>

            <li> 
                <img src="icons/Profile.png" alt="">
                <a href=""> Profile </a>
            </li>

            <li> 
                <img src="icons/Employees.png" alt="">
                <a href=""> Employees </a>
            </li>

            <li>
                <img src="icons/Pendings.png" alt="">
                <a href=""> Pendings </a>
            </li>

            <li>
                <img src="icons/Rules.png" alt="">
                <a href=""> Rules </a>
            </li>
            <li>
                <img src="icons/Log out.png" alt="">
                <a href=""> Log out </a>
            </li>
        </ul>
    </nav>

    <div class="navtop">
        <div class="navicon">
            <img src="icons/Dashboard Icon.png" alt="">
        </div>
        <div class="navtitle">
            <h1>NEW HIRED ON BOARD MANAGEMENT SYSTEM</h1>
        </div>

        <div class="adminprofile">
            <img id="profileIMG" src="icons/adminprofile.png" alt="">
            <img id="buntot" src="icons/more.png" alt="">
        </div>
    </div>

    <section>
    <div class="table-container">
    <h2>Employees Information List</h2>
    <table>
        <thead>
        <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Status of Application</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    GEOLIN
                </td>
                <td>
                    LOVERBOY
                </td>
                <td>
                    69
                </td>
                <td>
                    UNIDENTIFIED
                </td>
                <td>
                    loverboy@gmail.com
                </td>
                <td>
                    09999171221
                </td>
                <td>
                    YOU'RE HIRED!!!!!
                </td>
                <td>
                    <div class="button-wrapper">
                        <button>View</button>
                        <button>Delete</button>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="button">
        <a href="">
            <button>Create</button>
     
        </a>
    </div>
</div>

    </div>
    </section>

    
</body>
</html>