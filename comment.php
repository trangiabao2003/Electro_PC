<?php
session_start();
?>
<?php
include 'connect.php';
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
if(isset($_SESSION['user_id'])) {
$comment = $_POST['comment'];

$uid = $_SESSION['user_id'];
$username = $_SESSION['name_user'];
$date_time = date('Y-m-d H:i:s');
$sql_comment = "INSERT INTO  comment_user (ID_user, ID_product,username, Comment, datetime) 
VALUES ('$uid', '$id', '$username', '$comment', '$date_time')";
$kq_comment = mysqli_query($conn, $sql_comment);
header("Location:detail.php?id=$id");
}else {
    header("Location:login.php");
}

?>