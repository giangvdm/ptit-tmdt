<!doctype html>
<html class="no-js" lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Đơn hàng đã đặt</title>
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
        <?php 
            require_once 'model/OrdersdetailDao.php';
            require_once 'model/BookDao.php';
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $bookDao = new BookDao();
                $ordersDetailDao = new OrdersdetailDao();
                $listOrderDetail = $ordersDetailDao->getOrderDetail($id);
            }
        ?>
        <!-- End Search Popup -->

        <!-- End Search Popup -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Đơn hàng đã đặt</h2>
                            <nav class="bradcaump-content">
                                <a class="breadcrumb_item" href="index.php">Trang chủ</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb_item active">Đơn hàng đã đặt</span>
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
                                        <th class="product-price">Đơn giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Tạm tính</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if(isset($listOrderDetail)):
                                        $totalPrice  = 0;
                                    ?>
                                    <?php foreach($listOrderDetail as $orderDetail): ?>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img style="width:80px;height:100px;" src="<?=$bookDao->getBookById($orderDetail->getBookId())->getImage()?>" alt="product img"></a></td>
                                        <td class="product-name"><a href="#"><?=$bookDao->getBookById($orderDetail->getBookId())->getTitle()?></a></td>
                                        <td class="product-price"><span class="amount"><?=$bookDao->getBookById($orderDetail->getBookId())->getPrice()?>đ</span></td>
                                        <td class="product-price"><span class="amount"><?=$orderDetail->getQuantity()?></span></td>
                                        <td class="product-subtotal"><?=$bookDao->getBookById($orderDetail->getBookId())->getPrice()*$orderDetail->getQuantity()?>đ</td>
                                        <?php 
                                            $totalPrice += $bookDao->getBookById($orderDetail->getBookId())->getPrice()*$orderDetail->getQuantity();
                                        ?>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endif;?>
                                </tbody>
                            </table>
                        </div>
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
                                    <?php if(isset($listOrderDetail)):?>
                                    <li><?=$totalPrice?>đ</li>
                                    <li>0đ</li>
                                    <?php endif;?>
                                </ul>
                            </div>
                            <div class="cart__total__amount">
                                <span>Thành tiền</span>
                                <span><?=$totalPrice?>đ</span>
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

        <?php var_dump($_SESSION['orderList']); ?>

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
