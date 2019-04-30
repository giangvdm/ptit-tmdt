<?php
    require('./model/BookDao.php');
    $bookDao = new BookDao();
?>
<!doctype html>
<html class="no-js" lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trang chủ | Nhà sách Online</title>
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

        <!-- Start Slider area -->
        <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
            <!-- Start Single Slide -->
            <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider__content">
                                <div class="contentbox">
                                    <h2>Buy <span>your </span></h2>
                                    <h2>favourite <span>Book </span></h2>
                                    <h2>from <span>Here </span></h2>
                                    <a class="shopbtn" href="#">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slide -->
            <!-- Start Single Slide -->
            <div class="slide animation__style10 bg-image--7 fullscreen align__center--left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider__content">
                                <div class="contentbox">
                                    <h2>Buy <span>your </span></h2>
                                    <h2>favourite <span>Book </span></h2>
                                    <h2>from <span>Here </span></h2>
                                    <a class="shopbtn" href="#">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slide -->
        </div>
        <!-- End Slider area -->

        <!-- Start BEst Seller Area -->
        <section class="wn__product__area brown--color pt--80  pb--30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title text-center">
                            <h2 class="title__be--2">Sản phẩm <span class="color--theme">Mới</span></h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
                        </div>
                    </div>
                </div>
                <!-- Start Single Tab Content -->
                <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
                    <?php
                        $newBookList = $bookDao->listNewBooks(12);

                        foreach ($newBookList as $newBook) {
                    ?>
                    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="product__thumb">
                            <a class="first__img" href="controller/BookController.php?id=<?php echo $newBook->getId(); ?>"><img src="images/books/demo.jpg" alt="product image"></a>
                            <a class="second__img animation1" href="controller/BookController.php?id=<?php echo $newBook->getId(); ?>"><img src="images/books/demo.jpg" alt="product image"></a>
                            <?php
                                    if ($newBook->getIsBestSeller()):
                                ?>
                            <div class="hot__box">
                                <span class="hot-label">BÁN CHẠY</span>
                            </div>
                            <?php
                                    endif;
                                ?>
                        </div>
                        <div class="product__content content--center">
                            <h4><a href="product-detail.php"><?php echo $newBook->getTitle(); ?></a></h4>
                            <ul class="prize d-flex">
                                <li><?php echo $newBook->getPrice(); ?></li>
                                <?php 
                                        if ($newBook->getOldPrice()): 
                                    ?>
                                <li class="old_prize">
                                    <?php echo $newBook->getOldPrice(); ?>
                                </li>
                                <?php
                                        endif;
                                    ?>
                            </ul>
                            <div class="action">
                                <div class="actions_inner">
                                    <ul class="add_to_links">
                                        <li>
                                            <a class="cart" href="controller/addCart.php?id=<?php echo $newBook->getId(); ?>&&quantity=1"><i class="bi bi-shopping-cart-full"></i></a>
                                        </li>
                                        <li>
                                            <a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#<?php echo "modal-" . $newBook->getId(); ?>">
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
                <!-- End Single Tab Content -->
            </div>
        </section>
        <!-- Start BEst Seller Area -->

        <!-- Start Best Seller Area -->
        <section class="wn__bestseller__area bg--white pt--80  pb--30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title text-center">
                            <h2 class="title__be--2"><span class="color--theme">Tất cả </span> sản phẩm</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
                        </div>
                    </div>
                </div>
                <div class="row mt--50">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="product__nav nav justify-content-center" role="tablist">
                            <?php
                                $numberOfCategoryShown = 4;
                                $someCategories = $catDao->getAllCategories($numberOfCategoryShown);

                                foreach ($someCategories as $cat) {
                            ?>
                            <a class="nav-item nav-link js-tab-toggle" data-toggle="tab" href="#nav-<?php echo $cat->getName(); ?>" role="tab"><?php echo $cat->getName(); ?></a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab__container mt--60">
                    <?php
                        for ($i = 0; $i < $numberOfCategoryShown; $i++):
                    ?>
                    <div class="row single__tab tab-pane fade show" id="nav-<?php echo $someCategories[$i]->getName(); ?>" role="tabpanel">
                        <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                            <?php
                                    $someBooks = $bookDao->listBookByFilter($someCategories[$i]->getId(), null, 12);

                                    foreach ($someBooks as $book) {
                                ?>
                            <div class="single_product">
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="product product__style--3">
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
                                                            <a class="cart" href="controller/addCart.php?id=<?php echo $book->getId(); ?>&&quantity=1"><i class="bi bi-shopping-cart-full"></i></a>
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
                                </div>
                            </div>
                            <?php
                                    }
                                ?>
                        </div>
                    </div>
                    <?php
                        endfor;
                    ?>
                </div>
            </div>
        </section>


        <!-- Start BEst Seller Area -->
        <!-- Best Sale Area -->
        <section class="best-seel-area pt--80 pb--60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title text-center">
                            <h2 class="title__be--2">Sản phẩm <span class="color--theme">Bán chạy </span></h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
                        </div>
                    </div>
                </div>
                <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
                <?php
                    $bestSellerBookList = $bookDao->listBestSellerBooks(15);

                    foreach ($bestSellerBookList as $bestSellerBook) {
                ?>
                <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="product__thumb">
                        <a class="first__img" href="controller/BookController.php?id=<?php echo $bestSellerBook->getId(); ?>"><img src="images/books/demo.jpg" alt="product image"></a>
                        <a class="second__img animation1" href="controller/BookController.php?id=<?php echo $bestSellerBook->getId(); ?>"><img src="images/books/demo.jpg" alt="product image"></a>
                        <?php
                            if ($bestSellerBook->getIsBestSeller()):
                        ?>
                                <div class="hot__box">
                                    <span class="hot-label">BÁN CHẠY</span>
                                </div>
                        <?php
                            endif;
                        ?>
                    </div>
                    <div class="product__content content--center">
                        <h4><a href="product-detail.php"><?php echo $bestSellerBook->getTitle(); ?></a></h4>
                        <ul class="prize d-flex">
                            <li><?php echo $bestSellerBook->getPrice(); ?> VNĐ</li>
                            <?php 
                                if ($bestSellerBook->getOldPrice()): 
                            ?>
                                    <li class="old_prize">
                                        <?php echo $bestSellerBook->getOldPrice(); ?> VNĐ
                                    </li>
                            <?php
                                endif;
                            ?>
                        </ul>
                        <div class="action">
                            <div class="actions_inner">
                                <ul class="add_to_links">
                                    <li>
                                        <a class="cart" href="cart.php"><i class="bi bi-shopping-cart-full"></i></a>
                                    </li>
                                    <li>
                                        <a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#<?php echo "modal-" . $bestSellerBook->getId(); ?>">
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
        </section>
        <!-- Best Sale Area Area -->

        <!-- Footer Area -->
        <?php include('include/footer.php'); ?>
        <!-- //Footer Area -->


        <!-- QUICKVIEW PRODUCT -->
        <div id="quickview-wrapper">
            <?php
                $quickViewList = array_unique(array_merge($newBookList,$bestSellerBookList), SORT_REGULAR);

                // New books quick views
                foreach ($quickViewList as $book) {
                    include('include/quick-view.php');
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

    <!-- JS for All products module -->
    <script src="js/index-all-products.js"></script>

</body>

</html>
