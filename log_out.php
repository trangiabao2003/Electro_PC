<?php
@include 'connect.php';
session_start();
if(isset($_SESSION['user_id'])) {
    
    unset($_SESSION['user_id']);
    session_destroy();
    header('location:index.php');
    

}
?>