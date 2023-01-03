<?php session_start(); ?>
<!DOCTYPE html>
<link rel="icon" href="./img/logo.png" type="image">


<?php
if (!function_exists('currency_format')) {
    function currency_format($number)
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.');
        }
    }
}
include 'connect.php';
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$error = false;
$success = false;
if (isset($_GET['action'])) {

    function update_cart($add = false)
    {
        foreach ($_POST['quantity'] as $id => $quantity) {
            if ($quantity == 0) {
                unset($_SESSION['cart'][$id]);
            } else {
                if ($add) {

                    $_SESSION['cart'][$id] += $quantity;
                } else {
                    $_SESSION['cart'][$id] = $quantity;
                }
            }
        }
    }
    if (isset($_SESSION['user_id'])) {
        switch ($_GET['action']) {
            case "add":
                update_cart(true);
                header('Location:./cart.php');

                break;
            case "delete":
                if (isset($_GET['id'])) {
                    unset($_SESSION['cart'][$_GET['id']]);
                }
                header('Location:./cart.php');
                break;
            case "submit":
                if (isset($_POST['update_click'])) {
                    update_cart();
                    header('Location:./cart.php');
                } else if ($_POST['order_click']) {
                    if (empty($_POST['name'])) {
                        $error = "Bạn chưa nhập tên người nhận";
                    } else if (empty($_POST['phone'])) {
                        $error = "Bạn chưa nhập số điện thoại người nhận";
                    } else if (empty($_POST['address'])) {
                        $error = "Bạn chưa nhập địa chỉ người nhận";
                    } else if (empty($_POST['quantity'])) {
                        $error = "Giỏ hàng rỗng";
                    }
                    if ($error == false && !empty($_POST['quantity'])) {
                        $products = mysqli_query($conn, "SELECT * FROM product_info WHERE id IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                        $total = 0;
                        $orderProduct = array();
                        while ($row = mysqli_fetch_array($products)) {
                            $amount = $row['amount'];
                            $sold = $row['sold'];
                            $orderProduct[] = $row;
                            $total += $row['new_price'] * $_POST['quantity'][$row['ID']];
                        }
                        
                        $date = date("Y-m-d H:i:s");
                        $uid = $_SESSION['user_id'];
                        $insertOrder = mysqli_query($conn, "INSERT INTO `order_user` ( `ID_order`,`ID_user`,`Hoten`, `SDT`, `DiaChi`, `GhiChu`, `NgayDat`,`Tongtien`) VALUES (NULL,'" . $uid . "','" . $_POST['name'] . "','" . $_POST['phone'] . "','" . $_POST['address'] . "','" . $_POST['note'] . "','" . $date . "','" . $total . "')");
                        $orderID = $conn->insert_id;

                        $insertString = "";


                        $num = 0;
                        foreach ($orderProduct as $key => $product) {

                            $insertString .= "(NULL, '" . $orderID . "','" . $product['ID'] . "','" . $_POST['quantity'][$product['ID']] . "','" . $product['new_price'] . "','" . $date . "')";
                            if ($key != count($orderProduct) - 1) {
                                $insertString .= ",";
                            }
                        }

                        $insertOrder = mysqli_query($conn, "INSERT INTO `order_info` ( `id`,`ID_order`, `ID_product`, `Soluong`, `Gia`, `NgayDat`) VALUES " . $insertString . "");
                        $success = "Đặt hàng thành công";
                        unset($_SESSION['cart']);
                    
                }
                }
                break;
        }
    } else {
        header("Location:login.php");
    }
}
if (!empty($_SESSION["cart"])) {
    $products = mysqli_query($conn, "SELECT * FROM product_info WHERE id IN (" . implode(",", array_keys($_SESSION['cart'])) . ")");
}



?>
<html lang="en">

<head>
    <?php include './partitals/css.php'; ?>
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
            background-color: #D10024;
            border: 2px solid #D10024;
            padding-bottom: 34px;
            font-weight: 700;
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
                                <a href="show-wishlist.php">
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
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <ul class="main-nav nav navbar-nav">


                        <li><a href="danhsachhanghoa.php?category_id=<?php echo $row['id'] ?> "><?php echo $row['tendanhmuc']; ?> &nbsp;</a></li>

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
    <!-- /HEADER -->

    <!-- NAVIGATION -->


    <div class="container">
        <?php if (!empty($error)) { ?>
            <div id="notify-msg">
                <?php echo $error ?>. <a href="javascript:history.back()">Quay lại</a>
            </div>
        <?php } else if (!empty($success)) { ?>
            <div id="notify-msg">    
                <?php if($sold < $amount) {?>     
                    <?php echo $success ?>. <a href="index.php">Tiếp tục mua hàng</a>
                    <?php } else { ?>
                    <?php echo "Het hang"; ?>
                        <?php } ?>
            </div>
        <?php  } else { ?>
            <h1>Giỏ hàng</h1>
            <form id="cart-form" action="cart.php?action=submit" method="POST">
                <table>
                    <tr>
                        <th class="product-number">STT</th>
                        <th class="product-name">Tên sản phẩm</th>
                        <th class="product-img">Ảnh</th>
                        <th class="product-price">Giá tiền</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="total-money">Thành tiền</th>
                        <th class="product-delete">Xóa</th>
                    </tr>
                    <?php
                    if (!empty($products)) {
                        $total = 0;
                        $num = 1;
                        while ($row = mysqli_fetch_array($products)) {


                    ?>
                            <tr>
                                <td class="product-number"><?php echo $num++; ?></td>
                                <td class="product-name"><?php echo $row['title']; ?></td>
                                <td class="product-img"><img src="./img/<?php echo $row["image_name"]; ?>"></td>
                                <td class="product-price"><?php echo  currency_format($row["new_price"]); ?></td>
                                <td class="product-quantity"><input type="number" value="<?php echo $_SESSION['cart'][$row['ID']] ?>" name="quantity[<?php echo $row['ID'] ?>]"></td>
                                <td class="total-money"><?php echo  currency_format($row["new_price"] * $_SESSION['cart'][$row['ID']]); ?></td>
                                <td class="product-delete"><a href="cart.php?action=delete&id=<?php echo $row['ID'] ?>">Xóa</a></td>
                            </tr>
                        <?php
                            $total += $row["new_price"] * $_SESSION['cart'][$row['ID']];
                        }
                        ?>
                        <tr id="row-total">
                            <td class="product-number">&nbsp;</td>
                            <td class="product-name"><b>Tổng tiền</b></td>
                            <td class="product-img">&nbsp;</td>
                            <td class="product-price">&nbsp;</td>
                            <td class="product-quantity">&nbsp;</td>
                            <td class="total-money"><b><?php echo currency_format($total); ?></b></td>
                            <td></td>
                        </tr>
                    <?php
                    }

                    ?>

                </table>
                <div id="form-button">
                    <input type="submit" class="button" name="update_click" value="Cập nhật">
                </div>
                <hr>
                <div><label>Người nhận:</label><input type="text" value="" name="name"></div>
                <div><label>Điện thoại:</label><input type="text" value="" name="phone"></div>
                <div><label>Địa chỉ:</label><input type="text" value="" name="address"></div>
                <div><label>Ghi chú:</label><textarea name="note" id="" cols="50" rows="7"></textarea></div>
                <input type="submit" class="button" name="order_click" value="Đặt Hàng">
            </form>
        <?php } ?>
        <br>
        <br>
    </div>
    <?php

    include './partitals/footer.php';
    ?>
</body>

</html>