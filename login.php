<?php
session_start();
$Email = $password1 = "";
$EmailErr = $password1Err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Email"])) {
        $EmailErr = "Email is Required";
    } else {
        $Email = $_POST["Email"];
    }

    if (empty($_POST["password1"])) {
        $password1Err = "Password is Required";
    } else {
        $password1 = $_POST["password1"];
    }

    if ($Email && $password1) {
        include("connection.php");

        $check_Email = mysqli_query($connections, "SELECT * FROM login_tbl WHERE Email='$Email'");
        $check_Email_row = mysqli_num_rows($check_Email);

        if ($check_Email_row > 0) {
            while ($row = mysqli_fetch_assoc($check_Email)) {
                $db_password1 = $row["Password"];
                $db_account_type = $row["Account_type"];
                if ($password1 == $db_password1) {
                if ($db_account_type == "1") {
                    $_SESSION['email'] = $Email; 
                    echo "<script>window.location.href='admin.php';</script>";
                } else {
                    $_SESSION['email'] = $Email; 
                    echo "<script>window.location.href='user.php';</script>";
                }
            } else {
                $password1Err = "Incorrect password";
            }
            }
         }
        
        else {
            $EmailErr = "Email is not registered";
        }
    }
    // Reset error messages when the page is loaded initially
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $EmailErr = $password1Err = "";
}
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="video-container">
        <video src="videos/new wallpaper.mp4" muted loop autoplay></video>
    </div>
    <section>
            <form autocomplete="off" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-title">
                    <h1>SIGN IN</h1>
                </div>
                <div class="form-wrap">

                    <div class="formbox">
                        <input name="Email" type="Email" required>
                        <label for="">Email</label>
                        <img src="icons/employee.png" alt="">
                    </div>

                    <div class="formbox">
                        <input name="password1" type="password" required>
                        <label for="">Password</label>
                        <img src="icons/password.png" alt="">
                    </div>
                </div>

                <div class="btn">
                    <input type="Submit" value="Log in">
                </div>

                <div class="under-wrap">
                    <div class="remember">
                        <input type="checkbox">
                        <span>Remember Me</span>
                    </div>

                    <div class="forgot">
                       <a href="">Forgot Password?</a>
                    </div>
                </div>

                <div class="create-acc">
                    <a href="">Create Account</a>
                </div>
            </form>
    </section>
</body>
</html>