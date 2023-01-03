<?php session_start(); ?>
<?php 
include 'connect.php';
if(!isset($_SESSION['user_id'])) {
header('Location:index.php');
} else {
    $uid = $_GET['user_id'];
    $pid = $_GET['product_id'];
    $deleteWishlist = "DELETE FROM wishlist WHERE product_id = '$pid' AND user_id = '$uid'";
  

    if(mysqli_query($conn,$deleteWishlist)) {      
        header('location:show-wishlist.php');
    }
}
?>