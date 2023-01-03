<?php session_start(); ?>
<?php 
include 'connect.php';
if(!isset($_SESSION['user_id'])) {
header('Location:login.php');
} else {
    $uid = $_SESSION['user_id'];
    $pid = $_GET['id'];
    $sql = "SELECT * FROM wishlist WHERE product_id = $pid AND user_id = $uid";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) == 1) {
        echo 'Sản phẩm đã tồn tại trong danh sách yêu thích';
        header('location: show-wishlist.php');
    } else {
           $insertWishlist = "INSERT INTO wishlist (product_id, user_id) VALUES ('$pid', '$uid')";
    if(mysqli_query($conn, $insertWishlist)) {
        header('location: show-wishlist.php');
    }
 
    }
}
?>