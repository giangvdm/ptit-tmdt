<?php
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
                        <li class="drop"><a href="product-list.php">Danh mục</a>
                            <div class="megamenu mega03">
                                <ul class="item item03">
                                    <li class="title">Shop Layout</li>
                                    <li><a href="controller/BookController.php?category=1">Demo</a></li>
                                    <li><a href="single-product.php">Single Product</a></li>
                                </ul>
                                <ul class="item item03">
                                    <li class="title">Shop Page</li>
                                    <li><a href="my-account.php">My Account</a></li>
                                    <li><a href="cart.php">Cart Page</a></li>
                                    <li><a href="checkout.php">Checkout Page</a></li>
                                    <li><a href="error404.php">404 Page</a></li>
                                    <li><a href="faq.php">Faq Page</a></li>
                                </ul>
                                <ul class="item item03">
                                    <li class="title">Bargain Books</li>
                                    <li><a href="shop-grid.php">Bargain Bestsellers</a></li>
                                    <li><a href="shop-grid.php">Activity Kits</a></li>
                                    <li><a href="shop-grid.php">B&N Classics</a></li>
                                    <li><a href="shop-grid.php">Books Under $5</a></li>
                                    <li><a href="shop-grid.php">Bargain Books</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="faq.php">Câu hỏi thường gặp</a></li>
                        <li><a href="contact.php">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-8 col-sm-8 col-5 col-lg-2">
                <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                    <li class="shop_search"><a class="search__active" href="#"></a></li>
                    <!-- <li class="wishlist"><a href="#"></a></li> -->
                    <li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun">3</span></a>
                        <!-- Start Shopping Cart -->
                        <div class="block-minicart minicart__active">
                            <div class="minicart-content-wrapper">
                                <div class="micart__close">
                                    <span>đóng</span>
                                </div>
                                <div class="items-total d-flex justify-content-between">
                                    <span>3 sản phẩm</span>
                                    <span>Tạm tính</span>
                                </div>
                                <div class="total_amount text-right">
                                    <span>$66.00</span>
                                </div>
                                <div class="mini_action checkout">
                                    <a class="checkout__btn" href="cart.php">Mua hàng</a>
                                </div>
                                <div class="single__items">
                                    <div class="miniproduct">
                                        <div class="item01 d-flex">
                                            <div class="thumb">
                                                <a href="product-details.php"><img src="images/product/sm-img/1.jpg" alt="product images"></a>
                                            </div>
                                            <div class="content">
                                                <h6><a href="product-details.php">Voyage Yoga Bag</a></h6>
                                                <span class="prize">$30.00</span>
                                                <div class="product_prize d-flex justify-content-between">
                                                    <span class="qun">Qty: 01</span>
                                                    <ul class="d-flex justify-content-end">
                                                        <li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item01 d-flex mt--20">
                                            <div class="thumb">
                                                <a href="product-details.php"><img src="images/product/sm-img/3.jpg" alt="product images"></a>
                                            </div>
                                            <div class="content">
                                                <h6><a href="product-details.php">Impulse Duffle</a></h6>
                                                <span class="prize">$40.00</span>
                                                <div class="product_prize d-flex justify-content-between">
                                                    <span class="qun">Qty: 03</span>
                                                    <ul class="d-flex justify-content-end">
                                                        <li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item01 d-flex mt--20">
                                            <div class="thumb">
                                                <a href="product-details.php"><img src="images/product/sm-img/2.jpg" alt="product images"></a>
                                            </div>
                                            <div class="content">
                                                <h6><a href="product-details.php">Compete Track Tote</a></h6>
                                                <span class="prize">$40.00</span>
                                                <div class="product_prize d-flex justify-content-between">
                                                    <span class="qun">Qty: 03</span>
                                                    <ul class="d-flex justify-content-end">
                                                        <li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                <span><a href="#">Theo dõi đơn hàng</a></span>
                                                <span><a href="#">Thiết lập tài khoản</a></span>
                                                <span><a href="#">Đăng xuất</a></span>
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
                        <li><a href="shop-grid.php">Danh mục sản phẩm</a>
                            <ul>
                                <!-- Render all catagory entries here -->
                                <li><a href="shop-grid.php">Shop Grid</a></li>
                                <li><a href="single-product.php">Single Product</a></li>
                                <!-- -->
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