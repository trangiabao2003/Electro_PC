<?php
include('../../assets/database/connect.php');
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $danhmuc = $_POST['danhmuc'];
    if (isset($_POST['submit'])) {
        if (isset($_FILES["image"]["name"])) {
            $filename = $_FILES["image"]["name"];
        }
        if (isset($_FILES['image']['tmp_name'])) {
            $tempname = $_FILES['image']['tmp_name'];
            move_uploaded_file($tempname, "../../assets/image/" . $filename);
        }
        if ($id != "" && $danhmuc != "" && $filename != "") {
            $sql = "INSERT INTO danhmuc_info VALUES('$id', '$danhmuc', '$filename')";
            $qr = mysqli_query($conn, $sql);
            header('Location: ../quanlidanhmuc.php');
        } else {
            echo "<script>alert('Bạn vui lòng điền đầy đủ thông tin !')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>DASHBOARD ADMIN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />
    <link rel="icon" href="../../assets/image/admin.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Template Stylesheet -->
    <link href="../../assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="../../trangquantri.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">
                        <i class="fa fa-hashtag me-2"></i>ELECTRO
                    </h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../../assets/image/avatar.jpg" alt=""
                            style="width: 40px; height: 40px" />
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">B-Yun</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="../../trangquantri.php" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Trang chủ</a>
                    <a href="../quanlithongtinnguoidung.php" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Quản lý thông tin người
                        dùng</a>
                    <a href="../quanlidanhmuc.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Quản
                        lý danh mục</a>
                    <a href="../quanlisanpham.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Quản lý
                        sản
                        phẩm</a>
                    <a href="../quanlisanphamnoibat.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Quản
                        lý sản phẩm nổi
                        bật</a>
                    <a href="../quanlidonhang.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Quản lý
                        đơn
                        hàng</a>
                    <a href="../quanlithongtindonhang.php" class="nav-item nav-link"><i
                            class="fa fa-chart-bar me-2"></i>Quản lý thông tin
                        đơn hàng</a>
                    <a href="../quanlibinhluan.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Quản
                        lý
                        bình
                        luận</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../../assets/image/avatar.jpg" alt=""
                                style="width: 40px; height: 40px" />
                            <span class="d-none d-lg-inline-flex">Quản lý</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="../../logout.php" class="dropdown-item">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- ==================================================== Start Main Content ========================================================== -->
            <div class="mt-5 mx-5">
                <div class="text-center">
                    <h3>Thêm danh mục</h3>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <form action="" method="POST" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">ID</label>
                            <input type="text" name="id" placeholder="ID" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Danh Mục</label>
                            <input type="text" name="danhmuc" placeholder="DanhMuc" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Select image</label>
                            <input type="file" name="image" placeholder="Image">
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="submit" value="Add" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </table>
            </div>

            <!-- ==================================================== End Main Content ========================================================== -->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">ELECTRO</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="https://htmlcodex.com">HoangKien_B-Yun</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Template Javascript -->
    <script src="../../assets/js/main.js"></script>
</body>

</html>