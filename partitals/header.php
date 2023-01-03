<?php 
    session_start();
?>
<?php 
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'css.php' ;?>
  
</head>
<body>
<header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> electro@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Đà Nẵng</a></li>
                </ul>-
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-dollar"></i> VND</a></li>
                    <?php 

                    if(isset($_SESSION['user_id'])) {
                    ?>
                    <li><a href="/electro-master/login.php"><i class="fa fa-user-o"></i>
                    <?php echo  $_SESSION['name_user']?>
                </a>
                    <li><a href="log_out.php">Đăng xuất</a></li>
                   
                    <?php }else {?>
                    
                    <li><a href="login.php">Đăng nhập</a></li>

                    <li><a href="RegisterForm.php">Đăng kí</a></li>
<?php } ?>
                </li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="index.php" class="logo">
                                <img src="./img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                           
                        
                            <form action="search.php" method="POST" enctype="multipart/form-data">
                                <select class="input-select">
										<option value="0">All Categories</option>
									
									</select>
                                <input class="input" name="tu_khoa"  placeholder="Search here">
                                <input type="submit" class="search-btn" name="tim_kiem" value="Search"></input>
                            </form>
                         
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="show-wishlist.php">
                                    <i class="fa fa-heart-o"></i>
                                    <span>SP Yêu thích</span>
                             
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <a href="cart.php"><i class="fa fa-shopping-cart"></i> 
                                  <span>Giỏ hàng</span>
                                    <div class="qty">
                                     <?php 
                                     if(isset($_SESSION['cart'])) {
                                        $count = count($_SESSION['cart']);
                                        echo "$count";
                                     } else {
                                        echo "0";
                                     }
                                     ?>
                                    </div>
                                </a>
                                </a>
                               
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
</body>
</html>