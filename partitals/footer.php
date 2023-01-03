<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Về Chúng Tôi</h3>
                            <p>UY TÍN TẠO NIỀM TIN</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>Đà Nẵng</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>0845202304</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>electro@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Danh mục</h3>
                            <?php 
            $sql = "SELECT * FROM danhmuc_info ";
            $result = mysqli_query($conn, $sql);
            ?>
            <?php 
            while($row = mysqli_fetch_array($result)) {
            ?>
                            <ul class="footer-links">
                                <li style="padding-bottom: 14px"><a href="danhsachhanghoa.php?category_id=<?php echo $row['id'] ?> "><?php echo $row['tendanhmuc'] ;?> </a></li>
                               
                            </ul>
                            <?php   
    }

        ?>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Thông tin</h3>
                            <ul class="footer-links">
                                <li><a href="#">Về chúng tôi</a></li>
                                <li><a href="#">Liên hệ</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Đơn đặt hàng và trả lại</a></li>
                                <li><a href="#">Điều khoản và điều kiện</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Dịch vụ</h3>
                            <ul class="footer-links">
                                <li><a href="#">Tài khoản</a></li>
                                <li><a href="cart.php">Xem giỏ hàng</a></li>
                                <li><a href="show-wishlist.php">Danh sách yêu thích</a></li>
                                <li><a href="#">Theo dõi đơn hàng</a></li>
                                <li><a href="#">Trợ giúp</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa-brands fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa-solid fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-paypal"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-cc-discover"></i></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
</body>
</html>