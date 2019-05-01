<?php
	$con = mysqli_connect("localhost", "root", "", "bookstor");
	mysqli_autocommit($con, True);
	mysqli_set_charset($con, 'utf8');
?>

<!doctype html>
<html class="no-js" lang="vi">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Tài khoản của tôi</title>
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
                        	<h2 class="bradcaump-title">Thiết lập tài khoản</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.php">Trang chủ</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Thiết lập tài khoản</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
		
		<!-- Start My Account Area -->
		<?php
			if (isset($_SESSION['user'])) {
				$user = unserialize($_SESSION['user']);
			}
			else {
				$user = null;
			}
		?>

		<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Chỉnh sửa thông tin tài khoản</h3>
							<form action="controller/UserController.php" method="POST">
								<input type="hidden" name="customer-id" value="<?php if (isset($user)) echo $user->getId(); ?>">
								<div class="account__form">
									<div class="input__box">
										<label for="username">Tên tài khoản <span>*</span></label>
										<input type="text" name="username" value="<?php if (isset($user)) echo $user->getAccname(); ?>" required>
									</div>
									<div class="input__box">
										<label for="name">Họ và tên <span>*</span></label>
										<input type="text" name="name" value="<?php if (isset($user)) echo $user->getName(); ?>" required>
									</div>
									<div class="input__box">
										<label for="email">Email <span>*</span></label>
										<input type="text" name="email" value="<?php if (isset($user)) echo $user->getEmail(); ?>" required>
									</div>

									<br>
									<small>Nhập đầy đủ các trường dưới đây nếu bạn muốn cập nhật địa chỉ</small>
									<hr>
									<br>

									<div class="input__box">
										<label for="province-select">Tỉnh/Thành phố:</label>
										<select class="form-control js-location-select js-address-update" name="province" id="province-select">
											<?php
												$sql_address = "SELECT * FROM province order by name;";
												$query_address = mysqli_query($con, $sql_address);
												if (mysqli_num_rows($query_address) > 0) {
													while ($row = mysqli_fetch_assoc($query_address)) {
														echo ("<option value=\"" . $row['name'] . "\">" . $row['name'] . "</option>");
													}
												}
											?>
										</select>
									</div>
									<div class="input__box">
										<label for="district-select">Quận/Huyện</label>
										<select class="form-control js-location-select js-address-update" name="district" id="district-select"></select>
									</div>
									<div class="input__box">
										<label for="ward-select">Xã/Phường</label>
										<select class="form-control js-location-select js-address-update" name="ward" id="ward-select"></select>
									</div>
									<div class="input__box">
										<label for="address">Số nhà, tên đường: </label>
										<input type="text" name="address" class="js-address-update" aria-describedby="addressInputHelp">
										<small id="addressInputHelp" class="form-text text-muted">Địa chỉ hiện tại: <?php if (isset($user)) echo $user->getAddress(); ?></small>
									</div>
									<div class="form__btn">
										<button type="submit" name="account-update">Cập nhật</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Đổi mật khẩu</h3>
							<form action="controller/UserController.php" method="POST">
								<input type="hidden" name="customer-id" value="<?php if (isset($user)) echo $user->getId(); ?>">
								<div class="account__form">
									<div class="input__box">
										<label>Mật khẩu cũ <span>*</span></label>
										<input type="password" name="old-password" required>
									</div>
									<div class="input__box">
										<label>Mật khẩu mới <span>*</span></label>
										<input type="password" name="new-password" id="js-new-password" required>
									</div>
									<div class="input__box">
										<label>Nhập lại mật khẩu <span>*</span></label>
										<input type="password" name="repeat-password" id="js-repeat-password" aria-describedby="repeatPasswordHelp" required>
										<small id="repeatPasswordHelp" class="form-text text-muted">Xác nhận mật khẩu phải trùng với mật khẩu mới</small>
									</div>
									<div class="form__btn">
										<button type="submit" name="password-change">Cập nhật</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End My Account Area -->
		
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
	<script src="js/location-select.js"></script>
	<script src="js/change-password.js"></script>
	<script src="js/update-address.js"></script>

</body>
</html>