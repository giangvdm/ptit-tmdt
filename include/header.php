<?php 
    require 'model/User.php';
    session_start();
?>

<header id="wn__header" class="oth-page header__area header__absolute sticky__header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-7 col-lg-2">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/logo/logo.png" alt="logo images">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <nav class="mainmenu__nav">
                    <ul class="meninmenu d-flex justify-content-start">
                        <li class="drop with--one--item"><a href="index.php">Trang chủ</a></li>
                        <li class="drop"><a href="#">Danh mục</a>
                            <div class="megamenu mega02">
                                <ul class="item">
                                    <!-- <li class="title">Shop Layout</li> -->
                                    <?php
                                        require 'model/CategoryDao.php';

                                        $catDao = new CategoryDao();

                                        $catList = $catDao->getAllCategories();

                                        foreach ($catList as $category) {
                                    ?>
                                    <li><a href="controller/BookController.php?category=<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></a></li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-8 col-sm-8 col-5 col-lg-2">
                <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                    <li class="shop_search"><a class="search__active" href="#"></a></li>
                    <!-- <li class="wishlist"><a href="#"></a></li> -->
                    <li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun">
                                <?php
                                    if(!empty($_SESSION['cart'])) echo $_SESSION['bookCount'];
                                    else echo "0";
                                ?>
                            </span></a>
                        <!-- Start Shopping Cart -->
                        <div class="block-minicart minicart__active">
                            <div class="minicart-content-wrapper">
                                <div class="micart__close">
                                    <span>đóng</span>
                                </div>
                                <div class="items-total d-flex justify-content-between">
                                    <?php if(!empty($_SESSION['cart'])):?>
                                    <span><?=$_SESSION['bookCount']?> sản phẩm</span>
                                    <span>Tạm tính</span>
                                    <?php else : ?>
                                    <span>Chưa có sản phẩm nào <span>
                                            <?php endif; ?>
                                </div>
                                <div class="total_amount text-right">
                                    <?php if(!empty($_SESSION['cart'])):?>
                                    <span><?=$_SESSION['totalPrice']?>đ</span>
                                    <?php endif; ?>
                                </div>
                                <div class="mini_action checkout">
                                    <?php if(!empty($_SESSION['cart'])) :?>
                                    <a class="checkout__btn" href="controller/buyItem.php">Thanh toán</a>
                                </div>
                                <div class="single__items">
                                    <div class="miniproduct">
                                        <?php foreach($_SESSION['cart'] as $key => $val ): ?>
                                        <div class="item01 d-flex">
                                            <div class="thumb">
                                                <a href="product-details.php"><img style="width:75px;height:94px;" src="<?=$val['image']?>" alt="product images"></a>
                                            </div>
                                            <div class="content">
                                                <h6><a href="product-details.php"><?=$val['name']?></a></h6>
                                                <span class="prize"><?=$val['price']?>đ</span>
                                                <div class="product_prize d-flex justify-content-between">
                                                    <span class="qun">Số lượng: <?=$val['qty']?></span>
                                                    <ul class="d-flex justify-content-end">
                                                        <li><a href="controller/deleteItem.php?id=<?=$key?>"><i class="zmdi zmdi-delete"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="mini_action cart">
                                    <a class="cart__btn" href="cart.php">Xem chi tiết giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Shopping Cart -->
                    </li>
                    <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
                        <div class="searchbar__content setting__block">
                            <div class="content-inner">
                                <div class="switcher-currency">
                                    <strong class="label switcher-label">
                                        <span>Tài khoản của tôi</span>
                                    </strong>
                                    <div class="switcher-options">
                                        <div class="switcher-currency-trigger">
                                            <div class="setting__menu">
                                                <?php if (!isset($_SESSION['user'])) : ?>
                                                <span><a href="login.php" title="Đăng nhập">Đăng nhập</a></span>
                                                <span><a href="register.php" title="Đăng ký">Đăng ký</a></span>
                                                <?php else : ?>
                                                <?php $user = unserialize($_SESSION['user']);?>
                                                <span class="FontDouble !important;"><a href="#"> Chào <?php echo $user->getName(); ?></a></span>
                                                <span><a href="order-history.php">Đơn hàng đã đặt</a></span>
                                                <span><a href="my-account.php">Thiết lập tài khoản</a></span>
                                                <span><a href="controller/logoutControl.php" title="Đăng xuất">Đăng xuất</a></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Start Mobile Menu -->
        <div class="row d-none">
            <div class="col-lg-12 d-none">
                <nav class="mobilemenu__nav">
                    <ul class="meninmenu">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="#">Danh mục sản phẩm</a>
                            <ul>
                                <?php
                                    foreach ($catList as $category) {
                                ?>
                                <li><a href="controller/BookController.php?category=<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
                        <li><a href="faq.php">Câu hỏi thường gặp</a></li>
                        <li><a href="contact.php">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- End Mobile Menu -->
        <div class="mobile-menu d-block d-lg-none">
        </div>
        <!-- Mobile Menu -->
    </div>
</header>
