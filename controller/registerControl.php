<?php
require '../model/UserDao.php';
if(isset($_POST['register'])){
    $UserDao =  new UserDao();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    // $province = $_POST['province'];
    // $ward = $_POST['district'];
    // $ward = $_POST['ward'];
    $address = "".$_POST['address']."-".$_POST['ward']."-".$_POST['district']."-".$_POST['province']."";
    $user = new User();
    $user = $UserDao->loginCheck($username,$password);
    if($user!=null){
        echo ("<script>alert('Tài khoản đã tồn tại'); location ='../register.php'</script>");
    }else {
        # code...
        $UserDao->register($username,$password,$name,$email,$address);
        echo ("<script>alert('Đã đăng kí thành công'); location = '../login.php'</script>");
    }
    
}