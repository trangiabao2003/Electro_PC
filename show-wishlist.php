<?php session_start(); ?>
<!DOCTYPE html>
<link rel="icon" href="./img/logo.png" type="image" >

<html lang="en">

    <?php include 'connect.php'; ?>
    <?php
  
    if (!function_exists('currency_format')) {
        function currency_format($number)
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.');
            }
        }
    }
    ?>
<head>
    <?php include './partitals/css.php' ?>
    <style>
        body {
            font-family: arial;
        }

        * {
            box-sizing: border-box;
        }

        .container {
            width: 1200px;
            margin: 0 auto;
        }

        h1 {
            padding-top: 20px;
            text-align: center;
        }

        .product-items {
            border: 1px solid #000;
            padding: 30px;
        }

        .product-item {
            float: left;
            width: 23%;
            margin: 1%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #000;
            line-height: 26px;
        }

        .product-item label {
            font-weight: bold;
        }

        .product-item p {
            margin: 0;
            line-height: 26px;
            max-height: 52px;
            overflow: hidden;
        }

        .product-price {
            color: red;
            font-weight: bold;
        }

        .product-img {
            padding: 5px;
            border: 1px solid #000;
            margin-bottom: 5px;
        }

        .product-item img {
            max-width: 100%;
        }

        .product-item ul {
            margin: 0;
            padding: 0;
            border-right: 1px solid #000;
        }

        .product-item ul li {
            float: left;
            width: 33.3333%;
            list-style: none;
            text-align: center;
            border: 1px solid #000;
            border-right: 0;
            box-sizing: border-box;
        }

        .clear-both {
            clear: both;
        }

        a {
            text-decoration: none;
        }

        .buy-button {
            text-align: right;
            margin-top: 10px;
        }

        .buy-button a {
            background: #444;
            padding: 5px;
            color: #fff;
        }

        #pagination {
            text-align: right;
            margin-top: 15px;
        }

        .page-item {
            border: 1px solid #000;
            padding: 5px 9px;
            color: #000;
        }

        .current-page {
            background: #000;
            color: #FFF;
        }

        #product-detail {
            border-top: 1px solid #000;
            padding: 15px 0 0 0;
        }

        #product-img {
            width: 30%;
            float: left;
        }

        #product-info {
            float: right;
            width: 70%;
            text-align: left;
            padding-left: 30px;
        }

        #product-img img {
            max-width: 100%;
            padding: 5px;
            border: 1px solid #000;
            background: #eee;
        }

        h1 {
            text-align: left;
            margin-top: 0;
        }

        label.add-to-cart {
            background: #000;
            border: 1px solid #000;
            margin-top: 15px;
            padding: 15px;
            display: inline-block;
            color: #fff;
        }

        label a {
            color: #FFF;
        }

        #gallery {
            margin-top: 10px;
        }

        #gallery ul {
            margin: 0;
            padding: 0;
        }

        #gallery ul li {
            width: 150px;
            float: left;
            list-style: none;
            margin-right: 5px;
            margin-bottom: 5px;
            height: 100px;
            text-align: center;
            padding: 5px;
            border: 1px solid #000;
            background: #eee;
        }

        #gallery ul li img {
            max-width: 100%;
            max-height: 100%;
            vertical-align: middle;
        }

        table {
            border-collapse: collapse;
            width: 1170px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        table .product-img img {
            max-width: 100px;
        }

        table .product-name {
            width: 350px;
            padding-left: 20px;
        }

        table .product-img {
            width: 120px;
            text-align: center;
        }

        table .product-number {
            width: 50px;
            text-align: center;
        }

        table .product-price {
            width: 100px;
            text-align: center;
        }

        table .product-quantity input {
            width: 40px;
            text-align: center;
        }

        table .product-quantity {
            width: 60px;
            text-align: center;
        }

        table .total-money {
            width: 100px;
            text-align: center;
        }

        #form-button {
            text-align: right;
            margin-top: 15px;
        }

        .product-delete {
            width: 100px;
            text-align: center;
        }

        #cart-form label {
            width: 100px;
            display: inline-block;
            margin-top: 15px;
        }

        #cart-form textarea {
            margin-top: 15px;
        }

        #cart-form input {
            line-height: 30px;
            height: 30px;
        }

        input[name="order_click"] {
            margin-top: 15px;
        }

        .button {
            width: 126px;
            height: 52px;
            font-size: 16px;
            color: #fff;
            background-color: red;
            border: 2px solid red;
            padding-bottom: 34px;
        }

        #row-total {
            background: #eee;
            color: #000;
        }

        #add-to-cart-form input[type='text'] {
            margin-top: 10px;
            height: 30px;
            line-height: 30px;
        }

        #add-to-cart-form input[type='submit'] {
            background: #000;
            border: 1px solid #000;
            margin-top: 10px;
            padding: 15px;
            display: inline-block;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> electro@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Da Nang</a></li>
                </ul>-
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-dollar"></i> VND</a></li>
                    <?php

                    if (isset($_SESSION['user_id'])) {
                    ?>
                        <li><a href="/electro-master/login.php"><i class="fa fa-user-o"></i>
                                <?php echo  $_SESSION['name_user'] ?>
                            </a>
                        <li><a href="log_out.php">Log out</a></li>

                    <?php } else { ?>

                        <li><a href="login.php">Sign in</a></li>

                        <li><a href="RegisterForm.php">Sign up</a></li>
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
                            <form>
                                <select class="input-select">
                                    <option value="0">All Categories</option>
                                    <option value="1">Category 01</option>
                                    <option value="1">Category 02</option>
                                </select>
                                <input class="input" placeholder="Search here">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="#">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                   
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <a href="cart.php"><i class="fa fa-shopping-cart"></i>
                                        <span>Your Cart</span>
                                        <div class="qty">
                                            <?php
                                            if (isset($_SESSION['cart'])) {
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

    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <?php 
            $sql = "SELECT * FROM danhmuc_info ";
            $result = mysqli_query($conn, $sql);
            ?>
            <?php 
            while($row = mysqli_fetch_array($result)) {
            ?>
         <ul class="main-nav nav navbar-nav">
                  <!-- <li class="active"><a href="/electro-master/index.php">Home</a></li> -->
        
                   <li><a href="danhsachhanghoa.php?category_id=<?php echo $row['id'] ?> "><?php echo $row['tendanhmuc'] ;?> &nbsp;</a></li>
                 
               </ul>
          <?php   
    }

        ?>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <div class="container">
        <h1>Danh sách yêu thích</h1>
        <table>
            <tr>
                <th class="product-number">STT</th>
                <th class="product-name">Tên sản phẩm</th>
                <th class="product-img">Ảnh</th>
                <th class="product-price">Giá tiền</th>
                <th class="product-delete">Xóa</th>
            </tr>
            <?php
  if (isset($_SESSION['user_id'])) {

    $uid = $_SESSION['user_id'];
}
            $sql_wishlist = "SELECT * FROM wishlist JOIN product_info ON product_info.id=wishlist.product_id";
            $result_wishlist = mysqli_query($conn, $sql_wishlist);
            if (mysqli_num_rows($result_wishlist) > 0) {
                $num = 1;
                while ($row = mysqli_fetch_assoc($result_wishlist)) {


            ?>
                    <tr>
                        <td class="product-number"><?php echo $num++; ?></td>
                        <td class="product-name">
                       <?php echo $row["title"]; ?>
                 
                        </td>
                        <td class="product-img"><img src="./img/<?php echo $row["image_name"]; ?>"></td>
                        <td class="product-price"><?php echo  currency_format($row["new_price"]); ?></td>

                        <td class="product-delete"><a href="delete-wishlist.php?product_id=<?php echo $row['product_id'] ?>&user_id=<?php echo $_SESSION["user_id"]?>">Xóa</a></td>
                    </tr>
            <?php
                }
            } else {
                echo "Không có sản phẩm nào";
            }


            ?>
        </table>
    </div>
    <br>
    <br>
    <?php
    include './partitals/footer.php';
    ?>
</body>

</html>