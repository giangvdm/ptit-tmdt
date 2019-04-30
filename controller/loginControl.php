<?php
require_once '../model/UserDao.php';
// echo"abc";
// exit();
session_start();

if (isset($_POST['login'])) {
    # code...
    $username = $_POST['username'];
    $password = $_POST['password'];

    $Userdao = new UserDao();
    $user = new User();
    $user = $Userdao->loginCheck($username, $password);

    if ($user == null) {
        echo "<script>alert('tài khoản không tồn tại'); location = '../login.php'; </script>";

        // header("location:../login.php");

    } else {
        // $_SESSION['user'] = $user;
//        $_SESSION['obj'] = serialize($obj);
//
//$obj = unserialize($_SESSION['obj']);
        // echo "<script>alert('Đăng nhập thành công')</script>";
        $_SESSION['user'] = serialize($user);
        
        echo "<script>alert('đăng nhập thành công'); location = '../index.php';</script>";
        // echo $user->getAccname();
        // echo $_SESSION['username'];

        // echo $_SESSION['username']['accname'];
        // exit();
        echo "<script>window.location.href='../index.php'</script>";
        // header('location:../index.php');
    }
}
