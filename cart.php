<?php 
    // session_start();
?>
<!doctype html>
<html class="no-js" lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Giỏ hàng</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <link rel="stylesheet" href="fonts/css/all.css">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins/font-awesome.min.css">
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

        <!-- Start Search Popup -->
        <div class="box-search-content search_active block-bg close__top">
            <form id="search_mini_form" class="minisearch" action="#">
                <div class="field__search">
                    <input type="text" placeholder="Search entire store here...">
                    <div class="action">
                        <a href="#"><i class="zmdi zmdi-search"></i></a>
                    </div>
                </div>
            </form>
            <div class="close__wrap">
                <span>close</span>
            </div>
        </div>
        <!-- End Search Popup -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Giỏ hàng</h2>
                            <nav class="bradcaump-content">
                                <a class="breadcrumb_item" href="index.php">Trang chủ</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb_item active">Giỏ hàng</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->

        <!-- cart-main-area start -->
        <div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">

                        <div class="table-content wnro__table table-responsive">
                            <table>
                                <thead>
                                    <tr class="title-top">
                                        <th class="product-thumbnail">Ảnh</th>
                                        <th class="product-name">Tên sản phẩm</th>
                                        <th class="product-price">Gía</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Tạm tính</th>
                                        <th class="product-subtotal">Cập nhật</th>
                                        <th class="product-remove">Xóa</th>
                                    </tr>
                                </thead>
                                <?php if(!empty($_SESSION['cart'])): ?>
                                <tbody>
                                    <?php foreach($_SESSION['cart'] as $key => $val ): ?>
                                    <tr>
                                        <form action="controller/addCart.php" method="get">
                                            <td class="product-thumbnail"><a href="#"><img src="images/product/sm-3/1.jpg" alt="product img"></a></td>
                                            <td class="product-name"><a href="#"><?= $val['name']?></a></td>
                                            <td class="product-price"><span class="amount"><?= $val['price'] ?>đ</span></td>
                                            <td class="product-quantity"><input name="quantity" type="number" min=1 max=<?=$val['quantity']?> value="<?=$val['qty'] ?>"></td>
                                            <td class="product-subtotal"><?= $val['price']*$val['qty']?>đ</td>
                                            <td class="product-remove"><button type="submit" class="btn btn-default btn-sm"><i class="fa fa-pencil-square"></i></button></td>
                                            <td class="product-remove"><a href="controller/deleteItem.php?id=<?=$key?>">X</a></td>
                                            <input type="hidden" name="id" value="<?=$key?>">
                                        </form>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <?php endif; ?>
                            </table>
                        </div>
                        <?php if(!empty($_SESSION['cart'])):?>
                        <div class="cartbox__btn">
                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                <li><a href="index.php">Về trang chủ</a></li>
                                <li><a href="controller/buyItem.php">Thanh Toán</a></li>
                            </ul>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <div class="cartbox-total d-flex justify-content-between">
                                <ul class="cart__total__list">
                                    <li>Tạm tính (giỏ hàng)</li>
                                    <li>Phí giao hàng</li>
                                </ul>
                                <ul class="cart__total__tk">
                                    <?php if(!empty($_SESSION['cart'])):?>
                                    <li><?=$_SESSION['totalPrice']?>đ</li>
                                    <li>0đ</li>
                                    <?php endif;?>
                                </ul>
                            </div>
                            <div class="cart__total__amount">
                                <span>Thành tiền</span>
                                <span><?=$_SESSION['totalPrice']?>đ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->

        <!-- Footer Area -->
        <?php include('include/footer.php'); ?>
        <!-- //Footer Area -->

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
