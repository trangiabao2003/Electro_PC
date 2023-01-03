<?php
include('../../assets/database/connect.php');
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<?php
$sql = "DELETE from product_info WHERE ID = '" . $id . "'";
$result = mysqli_query($conn, $sql);
header('Location: ../quanlisanpham.php');
?>