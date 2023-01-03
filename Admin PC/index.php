<?php
session_start();
include('./assets/database/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/stylelogin.css">
    <link rel="icon" href="./assets/image/login.jpg">
    <title>Login Admin</title>
</head>

<body>
    <div class="container">
        <div class="myform">
            <form method="post">
                <h2>ADMIN LOGIN</h2>
                <input type="text" placeholder="Admin Name" name="adminname">
                <input type="password" placeholder="Password" name="password">
                <button type="submit" name="dangnhap">LOGIN</button>
            </form>
        </div>
        <div class="image">
            <img src="./assets/image/image.jpg">
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['adminname']) && isset($_POST['password']) && isset($_POST['dangnhap'])) {
    $tendangnhap = $_POST['adminname'];
    $matkhau = $_POST['password'];
    $sql = "Select * from login";
    $result1 = mysqli_query($conn, $sql);
    $result2 = mysqli_fetch_array($result1);
    $_SESSION['adminname'] = $tendangnhap;
    $_SESSION['password'] = $matkhau;
    if ($result2[1] == $tendangnhap && $result2[2] == $matkhau) {
        header('Location: ./trangquantri.php');
    } else if ($result2[1] == $tendangnhap && $result2[2] != $matkhau) {
        echo '<script>alert("Mật khẩu của bạn không đúng vui lòng nhập lại")</script>';
    } else if ($result2[1] != $tendangnhap && $result2[2] == $matkhau) {
        echo '<script>alert("Tên đăng nhập của bạn không đúng vui lòng nhập lại")</script>';
    } else if ($result2[1] != $tendangnhap && $result2[2] != $matkhau) {
        echo '<script>alert("Tài khoản và mật khẩu của bạn không tồn tại")</script>';
    }
}
?>