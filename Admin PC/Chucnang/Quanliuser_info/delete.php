<?php
include('../../assets/database/connect.php');
?>

<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
?>

<?php
$sql = "DELETE from user_info WHERE ID = '" . $id . "'";
$result = mysqli_query($conn, $sql);
header('Location: ../quanlithongtinnguoidung.php');
?>