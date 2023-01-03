<?php
include 'connect.php';

if (isset($_GET["id"])) {
	$id = $_GET["id"];
}
$sql = "SELECT * FROM product_info WHERE ID = $id";
$kq = mysqli_query($conn, $sql);
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
<?php
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$img_pro = mysqli_query($conn, "SELECT * FROM image_desc WHERE id_product =$id ");
}

?>

<!DOCTYPE html>
<link rel="icon" href="./img/logo.png" type="image">

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro - HTML Ecommerce Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<link type="text/css" rel="stylesheet" href="css/grid.css" />


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<style>
		.grid__column-6 {
			padding-left: 5px;
			padding-right: 5px;
			width: 50%;
		}

		.grid__row {
			display: flex;
			flex-wrap: wrap;
			margin-left: -5px;
			margin-right: -5px;
		}

		p img {
			border: 2px solid white;
		}

		p img:hover {
			border: 2px solid red;
		}
	</style>
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

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb-tree">
						<li><a href="./index.php">Home</a></li>
						<li><a href="#">All Categories</a></li>
					
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->

			<div class="grid wide">
				<div class="row">
					<!-- Product main img -->

					<?php

					?>

					<?php

					while ($row = mysqli_fetch_array($kq)) {
					?>
						<div class="col c-6 text-center">

							<div>
								<img src="./img/<?php echo $row["image_name"]; ?>" style="width:300px" id="main-img">

							</div>

						</div>
					<?php
					}
					?>



					<div class="col c-6">

						<?php
						$sql = "SELECT * FROM product_info WHERE ID = $id";
						$result = mysqli_query($conn, $sql);
						$categoryID = array();
						while ($row_pro = mysqli_fetch_array($result)) {
							// Query related product
							$query = mysqli_query($conn, " SELECT * FROM product_info WHERE category_id = '" . $row_pro['category_id'] . "' ORDER BY RAND() LIMIT 4");

						?>


							<div class="product-details">

								<h2 class="product-name"><?php echo $row_pro["title"]; ?></h2>
							
								<div>
									<h3 class="product-price"><?php echo  currency_format($row_pro["new_price"]); ?> <del class="product-old-price"><?php echo  currency_format($row_pro["old_price"]); ?></del></h3>
									<span class="product-available">In Stock</span>
								</div>
								<p><?php echo $row_pro["description"]; ?></p>



								<form id="add-to-cart-form" action="cart.php?action=add" method="post">
									<div class="add-to-cart">
										<div class="qty-label">
											<input type="number" min="1" name="quantity[<?php echo $row_pro['ID'] ?>]" value="1" style="height:30px; width:40px; border:2px solid #e0ebeb">

										</div>
										<input type="submit" name="add-to-cart" class="add-to-cart-btn" value="Mua hàng" style="padding:0 10px;text-align:center;cursor:pointer"></input>
								</form>
							</div>

							<ul class="product-btns">
								<li><a href="wishlist.php?id=<?php echo $row_pro['ID'] ?>"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
								
							</ul>



							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa-brands fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>
							<input type="hidden" name="image" value="<?php echo $row_pro["image_name"]; ?>">
							<input type="hidden" name="name" value="<?php echo $row_pro["title"]; ?>">
							<input type="hidden" name="newprice" value="<?php echo  currency_format($row_pro["new_price"]); ?>">
							<input type="hidden" name="oldprice" value="<?php echo  currency_format($row_pro["old_price"]); ?>">
					</div>

				<?php
						}
				?>
				</div>
			</div>
		</div>
		<p>
			<?php foreach ($img_pro as $key => $value) { ?>
				<img src="./img/<?php echo $value['image'] ?>" alt="" style="width:150px">
				<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
				<script>
					$('p img').click(function() {
						let imgPath = $(this).attr('src');
						$('#main-img').attr('src', imgPath);
					})
				</script>
			<?php } ?>
		</p>
		<!-- /Product details -->

		<!-- Product tab -->
		<div class="col-md-12">
			<div id="product-tab">
				<!-- product tab nav -->
				<ul class="tab-nav">
					<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
					
					<li><a data-toggle="tab" href="#tab3">Reviews </a></li>
				</ul>
				<!-- /product tab nav -->

				<!-- product tab content -->
				<div class="tab-content">
					<!-- tab1  -->
					<div id="tab1" class="tab-pane fade in active">
						<?php
						$sql = "SELECT * FROM product_info WHERE ID = $id";
						$result = mysqli_query($conn, $sql);
						while ($row = mysqli_fetch_array($result)) {

						?>
							<div class="row">
								<div class="col-md-12">
									<p><?php echo $row["description"]; ?></p>
								</div>
							</div>
						<?php
						}

						?>
					</div>
					<!-- /tab1  -->

			

					<!-- tab3  -->
					<div id="tab3" class="tab-pane fade in">
						<h2>Bình Luận</h2>
						<div class="row">

							<!-- Reviews -->
							<div class="col-md-8">
								<div id="reviews">
									<?php
									$sql_comment = "SELECT * FROM comment_user WHERE ID_product = $id";
									$kq_comment = mysqli_query($conn, $sql_comment);
									if(isset($_SESSION['user_id'])) {
									while ($row_comment = mysqli_fetch_array($kq_comment)) {
									?>
										<ul class="reviews">
											<li>
												<div class="review-heading">
													<h5 class="name"><?php echo $row_comment['username'] ?></h5>
													<p class="date"><?php echo $row_comment['datetime'] ?></p>												
												</div>
												<div class="review-body" style="min-height:10px">
													<p style="text-align:center"><?php echo $row_comment['Comment'] ?></p>
												</div>
											</li>
											<li>
											<div class="" style="min-height: 70px; position: absolute; width: 130px;top: 0; height: 70px;">
													<h5 class="name">
													<i class="fa-solid fa-play" style="margin-right: 4px;"></i>
														admin</h5>
													<p style="color: #8D99AE;font-size: 10px;margin: 0;"><?php echo $row_comment['datetime'] ?></p>												
											</div>
											<div class="review-body">
													<p style="text-align:center"><?php echo $row_comment['Rep_comment'] ?></p>
												</div>
											</li>

										</ul>

									<?php }
									} 

									?>

								</div>
							</div>
							<!-- /Reviews -->

							<!-- Review Form -->
							<div class="col-md-4">

								<div id="review-form">
									<form action="comment.php?id=<?php echo $_GET['id']; ?>" method="POST" class="review-form">

										<textarea required="" name="comment" class="input" placeholder="Your Review"></textarea>

										<button type="submit" name="submit" class="primary-btn">Submit</button>
									</form>
								</div>
							</div>
							<!-- /Review Form -->
						</div>

					</div>
					<!-- /tab3  -->
				</div>
				<!-- /product tab content  -->
			</div>
		</div>
		<!-- /product tab -->
	</div>
	<!-- /row -->
	</div>
	<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- Section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h3 class="title">Sản phẩm liên quan</h3>
					</div>
				</div>

				<!-- product -->


				<?php
				while ($row_related = mysqli_fetch_array($query)) {
				?>
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./img/<?php echo $row_related["image_name"]; ?>" alt="">
								<div class="product-label">
									<span class="sale">-30%</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="detail.php?id=<?php echo $row_related["ID"]; ?>"><?php echo $row_related["title"]; ?></a></h3>
								<h4 class="product-price"><?php echo  currency_format($row_related["new_price"]); ?> <del class="product-old-price"><?php echo  currency_format($row_related["old_price"]); ?></del></h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
								</div>
							</div>

						</div>
					</div>

				<?php  }  ?>

				<!-- /product -->



				<div class="clearfix visible-sm visible-xs"></div>





			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /Section -->

	<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="newsletter">
						<p>Đăng kí để nhận <strong>THÔNG BÁO MỚI NHẤT</strong></p>
						<form>
							<input class="input" type="email" placeholder="Nhập Email của bạn">
							<button class="newsletter-btn"><i class="fa fa-envelope"></i> Đăng kí</button>
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