<?php
function calCart(){
    if(isset($_SESSION['cart'])){
        $bookCount = 0;
        $totalPrice = 0;
        foreach($_SESSION['cart'] as $key => $val ){
            $bookCount += $val['qty'];
            $totalPrice += ($val['price']*$val['qty']);
        }
        $_SESSION['bookCount'] = $bookCount;
        $_SESSION['totalPrice'] = $totalPrice; 
    }
}
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
    calCart();
    header("Location: ../cart.php");
}else{
    echo "Loi";
}
