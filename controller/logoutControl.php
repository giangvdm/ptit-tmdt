<?php  
session_start();
unset($_SESSION['user']); 
echo "<script>alert('đăng xuất thành công'); location = '../index.php';</script>";
?>
