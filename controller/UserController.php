<?php
    session_start();

    if (isset($_POST['password-change'])) {
        require '../model/UserDao.php';

        $customerId = $_POST['customer-id'];
        $oldPass = $_POST['old-password'];
        $newPass = $_POST['new-password'];
        $userDao = new UserDao();

        $isPasswordChanged = $userDao->changePassword($customerId, $oldPass, $newPass);

        if ($isPasswordChanged) {
            echo "<script>alert('đổi mật khẩu thành công'); location = '../my-account.php';</script>";
        }
        else {
            echo "<script>alert('đổi mật khẩu thất bại'); location = '../my-account.php';</script>";
        }
    }

    if (isset($_POST['account-update'])) {
        require '../model/UserDao.php';

        $customerId = $_POST['customer-id'];
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        if ($_POST['province'] != "") $province = $_POST['province'];
        if (isset($_POST['district'])) $district = $_POST['district'];
        if (isset($_POST['ward'])) $ward = $_POST['ward'];
        if ($_POST['address'] != "") $address = $_POST['address'];

        // Construct new account info array
        $info = array(
            'id' => $customerId,
            'username' => $username,
            'name' => $name,
            'email' => $email
        );
        if (isset($address)) $info['address'] = $address;
        if (isset($_POST['ward'])) $info['ward'] = $ward;
        if (isset($_POST['district'])) $info['district'] = $district;
        if (isset($province)) $info['province'] = $province;

        $userDao = new UserDao();

        $isAccountUpdated = $userDao->updateCustomerInfo($customerId, $info);

        if ($isAccountUpdated) {
            $currentUser = unserialize($_SESSION['user']);
            $updatedUser = new User();
            $updatedUser = $userDao->loginCheck($currentUser->getAccname(), $currentUser->getPassword());
            $_SESSION['user'] = serialize($updatedUser);
            echo "<script>alert('Cập nhật thông tin tài khoản thành công'); location = '../my-account.php';</script>";
        }
        else {
            echo "<script>alert('Cập nhật thông tin tài khoản thất bại'); location = '../my-account.php';</script>";
        }
    }