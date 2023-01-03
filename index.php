
<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="./img/logo.png" type="image" >

<?php
include './connect.php';

if (isset($_GET["category_id"])) {
    $category_id = $_GET["category_id"];
}

?>
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
    <?php include './partitals/css.php'; ?>
  
</head>

<body>
    <!-- HEADER -->
    <?php

    include './partitals/header.php';
    ?>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <?php

    include './partitals/menu.php';
    ?>
    <!-- /NAVIGATION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                <?php
                $sql = "SELECT * FROM danhmuc_info LIMIT 3";
                $result = mysqli_query($conn, $sql);
                ?>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>

                    <div class="col-md-4 col-xs-6">
                        <div class="shop">


                            <div class="shop-img">
                                <img src="./img/<?php echo $row["image_name"]; ?>">
                            </div>
                            <div class="shop-body">
                                <h3><?php echo $row["tendanhmuc"]; ?><br>Collection</h3>

                                <a href="danhsachhanghoa.php?category_id=<?php echo $row['id'] ?>" class="cta-btn"> Shop now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php
                }

                ?>

                <!-- /shop -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Sản phẩm mới</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <?php
                                $sql = "SELECT * FROM danhmuc_info ";
                                $result = mysqli_query($conn, $sql);
                                ?>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <li><a href="./index.php?category_id=<?php echo $row['id'] ?>"><?php echo $row['tendanhmuc']; ?></a></li>
                                <?php
                                }

                                ?>
                            </ul>

                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">

                    <div class="row">


                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <form action="" method="post">
                                    <div class="products-slick" data-nav="#slick-nav-1">

                                        <?php
                                        if (!isset($_GET['category_id'])) {

                                            $sql = "SELECT * FROM product_info ";
                                        } else {
                                            $sql = "SELECT * FROM product_info WHERE category_id = $category_id LIMIT 5";
                                        }

                                        $kq = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($kq)) {

                                        ?>
                                            <!-- product -->
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="./img/<?php echo $row["image_name"]; ?>" alt="">
                                                    <div class="product-label">
                                                        <span class="sale">-30%</span>
                                                        <span class="new">NEW</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Category</p>
                                                    <h3 class="product-name"><a href="detail.php?id=<?php echo $row["ID"]; ?>"><?php echo $row["title"]; ?></a></h3>
                                                    <h4 class="product-price"><?php echo  currency_format($row["new_price"]); ?>&nbsp;<del class="product-old-price"><?php echo  currency_format($row["old_price"]); ?></del></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product-btns">
                                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                    </div>
                                                </div>




                                            </div>
                                </form>

                                <!-- /product -->


                            <?php
                                        }

                            ?>

                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>


                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
               
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3 id="days"></h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3 id="hours"></h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3 id="mins"></h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3 id="secs"></h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <script>
                    const days = document.getElementById('days');
                    const hours = document.getElementById('hours');
                    const mins = document.getElementById('mins');
                    const secs = document.getElementById('secs');
                    const currentYear = new Date().getFullYear();
                    const hotDealTime = new Date(`December 20 ${currentYear } 00:00:00`);
                    function updateCountdown() {
                        const currentTime = new Date();
                        const diff = hotDealTime - currentTime;

                        const d = Math.floor(diff / 1000 / 60 / 60 / 24);
                        const h = Math.floor(diff / 1000 / 60 / 60) % 24;
                        const m = Math.floor(diff / 1000 / 60) % 60;
                        const s = Math.floor(diff / 1000) % 60;

                        days.innerHTML = d;
                        hours.innerHTML = h < 10 ? '0' + h : h;
                        mins.innerHTML = m < 10 ? '0' + m : m;
                        secs.innerHTML = s < 10 ? '0' + s : s;
                    }
                    setInterval(() => updateCountdown(), 1000);
                </script>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Sản phẩm nổi bật</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <?php
                                $noibat = 'Có';
                                $sql = "SELECT * FROM danhmuc_info  ";
                                $result = mysqli_query($conn, $sql);
                                ?>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {

                                ?>
                                    <li><a href="index.php?category_id=<?php echo $row['id'] ?>"><?php echo $row['tendanhmuc']; ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->

                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    <!-- product -->
                                    <?php
                                    if (!isset($_GET['category_id'])) {

                                        $sql = "SELECT * FROM product_info ";
                                    } else {
                                        $noibat = 'Có';
                                        $sql = "SELECT * FROM product_info WHERE category_id = '" .$category_id. "' AND featured = '" . $noibat . "'  LIMIT 5";
                                    }
                                    $query = mysqli_query($conn, $sql);


                                    while ($row = mysqli_fetch_array($query)) {

                                    ?>
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="./img/<?php echo $row["image_name"]; ?>" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category</p>
                                                <h3 class="product-name"><a href="detail.php?id=<?php echo $row["ID"]; ?>"><?php echo $row["title"]; ?></a></h3>
                                                <h4 class="product-price"><?php echo  currency_format($row["new_price"]);?>&nbsp;<del class="product-old-price"><?php echo  currency_format($row["old_price"]); ?></del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- /product -->

                                    <?php
                                    }

                                    ?>
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <?php
    echo ""
    ?>
    <!-- /SECTION -->



    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Đăng kí để nhận <strong>THÔNG BÁO MỚI</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    <?php

    include './partitals/footer.php';
    ?>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>