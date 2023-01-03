<?php
include('../../assets/database/connect.php');
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<?php
$sql = "DELETE from comment_user WHERE id = '" . $id . "'";
$result = mysqli_query($conn, $sql);
header('Location: ../quanlibinhluan.php');
?>