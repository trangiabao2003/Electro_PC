<?php
include('../../assets/database/connect.php');
?>

<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
?>

<?php
$sql = "DELETE from order_info WHERE ID_order = '" . $id . "'";
$result = mysqli_query($conn, $sql);
$query2 = "DELETE from order_user WHERE ID_order = '" . $id . "'";
$result2 = mysqli_query($conn, $query2);
header('Location: ../quanlithongtindonhang.php');
?>