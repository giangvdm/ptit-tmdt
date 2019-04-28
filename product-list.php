<?php
	// session_start();
	require './model/Book.php';
	// require 'BookDao.php';
?>

<!doctype html>
<html class="no-js" lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Danh sách sản phẩm</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Cusom css -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer js -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">

        <!-- Header -->
        <?php include('include/header.php'); ?>
        <!-- //Header -->
        <!-- Start Search Popup -->
        <?php include('include/search.php'); ?>
        <!-- End Search Popup -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Danh sách sản phẩm</h2>
                            <nav class="bradcaump-content">
                                <a class="breadcrumb_item" href="index.php">Trang chủ</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb_item active">Danh sách sản phẩm</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->

        <!-- Start Shop Page -->
        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                        <div class="shop__sidebar">
                            <!-- Categories -->
                            <?php include('include/widget-category.php'); ?>

                            <!-- Filter by price -->
                            <?php include('include/widget-filter-by-price.php'); ?>

                            <!-- Product tag section was here -->

                            <!-- Sales off -->
                            <?php include('include/widget-sale-off-product.php'); ?>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12 order-1 order-lg-2">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
                                    <div class="shop__list nav justify-content-center" role="tablist">
                                        <!-- Grid View and List View toggle -->
                                        <!-- <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
			                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a> -->
                                    </div>
                                    <p>Tìm thấy <?php echo count($_SESSION['bookList']); ?> kết quả </p>
                                    <div class="orderby__wrapper">
                                        <span>Sắp xếp theo</span>
                                        <select class="shot__byselect">
                                            <option>Mặc định</option>
                                            <option>Bán chạy</option>
                                            <option>Gía tăng dần</option>
                                            <option>Gía giảm dần</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab__container">
                            <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                                <div class="row">
                                    <?php
										if (!isset($_GET['category'])) {
											header('location:index.php');
										}

										foreach ($_SESSION['bookList'] as $book) {
									?>
                                    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product__thumb">
                                            <a class="first__img" href="controller/BookController.php?id=<?php echo $book->getId(); ?>"><img src="images/books/demo.jpg" alt="product image"></a>
                                            <a class="second__img animation1" href="controller/BookController.php?id=<?php echo $book->getId(); ?>"><img src="images/books/demo.jpg" alt="product image"></a>
                                            <?php
														if ($book->getIsBestSeller()):
													?>
                                            <div class="hot__box">
                                                <span class="hot-label">BÁN CHẠY</span>
                                            </div>
                                            <?php
														endif;
													?>
                                        </div>
                                        <div class="product__content content--center">
                                            <h4><a href="product-detail.php"><?php echo $book->getTitle(); ?></a></h4>
                                            <ul class="prize d-flex">
                                                <li><?php echo $book->getPrice(); ?></li>
                                                <?php 
															if ($book->getOldPrice()): 
														?>
                                                <li class="old_prize">
                                                    <?php echo $book->getOldPrice(); ?>
                                                </li>
                                                <?php
															endif;
														?>
                                            </ul>
                                            <div class="action">
                                                <div class="actions_inner">
                                                    <ul class="add_to_links">
                                                        <li>
                                                            <a class="cart" href="controller/addCart.php?id=<?php echo $book->getId(); ?>"><i class="bi bi-shopping-cart-full"></i></a>
                                                        </li>
                                                        <li>
                                                            <a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#<?php echo "modal-" . $book->getId(); ?>">
                                                                <i class="bi bi-search"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
										}
									?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Shop Page -->

        <!-- Footer Area -->
        <?php include('include/footer.php'); ?>
        <!-- //Footer Area -->


        <!-- QUICKVIEW PRODUCT -->
        <div id="quickview-wrapper">
            <?php
					foreach ($_SESSION['bookList'] as $book) {
				?>
            <div class="modal fade" id="<?php echo "modal-" . $book->getId(); ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal__container" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal__header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product">
                                <!-- Start product images -->
                                <div class="product-images">
                                    <div class="main-image images">
                                        <img alt="big images" src="images/product/big-img/1.jpg">
                                    </div>
                                </div>
                                <!-- end product images -->
                                <div class="product-info">
                                    <h1><a href="controller/BookController.php?id=<?php echo $book->getId(); ?>"><?php echo $book->getTitle(); ?></a></h1>
                                    <div class="price-box-3">
                                        <div class="s-price-box">
                                            <span class="new-price"><?php echo $book->getPrice(); ?></span>
                                            <span class="old-price">$45.00</span>
                                        </div>
                                    </div>
                                    <div class="quick-desc">
                                        <?php echo $book->getDescription(); ?>
                                    </div>
                                    <div class="social-sharing">
                                        <div class="widget widget_socialsharing_widget">
                                            <h3 class="widget-title-modal">Share this product</h3>
                                            <ul class="social__net social__net--2 d-flex justify-content-start">
                                                <li class="facebook"><a href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
                                                <li class="linkedin"><a href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                                                <li class="pinterest"><a href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                                <li class="tumblr"><a href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="addtocart-btn">
                                        <a href="#">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
					}
				?>
        </div>
        <!-- END QUICKVIEW PRODUCT -->
    </div>
    <!-- //Main wrapper -->

    <!-- JS Files -->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>

</body>

</html>
