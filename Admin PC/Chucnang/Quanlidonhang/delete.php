<?php
include('../../assets/database/connect.php');
?>

<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
?>

<?php
$sql = "DELETE from order_user WHERE ID_order = '" . $id . "'";
$result = mysqli_query($conn, $sql);
$sql2 = "DELETE from order_info WHERE ID_order = '" . $id . "'";
$result2 = mysqli_query($conn, $sql2);
header('Location: ../quanlidonhang.php');
?>