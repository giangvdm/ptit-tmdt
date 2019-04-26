<!doctype html>
<html class="no-js" lang="vi">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Đăng nhập</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

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
                        	<h2 class="bradcaump-title">Đăng nhập</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Trang chủ</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Đăng nhập</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="wn_contact_area bg--white pt--80 pb--80">
        	<div class="container">
        		<div class="row">
        			<div class="offset-lg-2 col-lg-8 col-md-12">
        				<div class="contact-form-wrap">
        					<h2 class="contact__title">Đăng nhập vào tài khoản thành viên</h2>
        					<p>Tiến hành đăng nhập để có trải nghiệm sử dụng dịch vụ tốt hơn. </p>
                            <form id="contact-form" action="#" method="post">
                                <div class="single-contact-form">
                                    <input type="text" name="username" placeholder="Tên tài khoản" required>
                                </div>
                                <div class="single-contact-form">
                                    <input type="text" name="password" placeholder="Mật khẩu" required>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit" name="login">Đăng nhập</button>
                                </div>
                            </form>
                        </div> 
                        <div class="form-output">
                            <p class="form-messege">
                        </div>
        			</div>
        		</div>
        	</div>
        </section>
        <!-- End Contact Area -->

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