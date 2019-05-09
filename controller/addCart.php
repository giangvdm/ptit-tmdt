<?php
require '../model/BookDao.php';
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
    if(isset($_GET['id'])&& $_GET['id'] != null){
        $id = $_GET['id'];
    }else{
        $id = null;
    }
    if(isset($_GET['quantityUpdate'])){
        $_SESSION['cart'][$id]['qty'] = $_GET['quantityUpdate'];
        calCart();
        header("Location: ../cart.php");
        exit();
    }else{
        $book = new Book();
        $bookDao = new BookDao();
        $book = $bookDao->getBookById($id);
        if($book!=null){
            if(isset($_SESSION['cart'])){
                if(isset($_SESSION['cart'][$id])){
                    $_SESSION['cart'][$id]['qty'] += $_GET['quantity'];
                }else{
                    $_SESSION['cart'][$id]['qty'] = $_GET['quantity'];
                }
                $_SESSION['success'] = 'Tồn tại giỏ hàng ! Cập nhật mới thành công';
                $_SESSION['cart'][$id]['name'] = $book->getTitle();
                $_SESSION['cart'][$id]['price'] = $book->getPriceValue();
                $_SESSION['cart'][$id]['image'] = $book->getImage();
                $_SESSION['cart'][$id]['quantity'] = $book->getQuantity();
                if($_SESSION['cart'][$id]['qty'] > $book->getQuantity()){
                    $_SESSION['cart'][$id]['qty'] = $book->getQuantity();
                }
                calCart();
                header("Location: ../cart.php");
                exit();
            }else{
                $_SESSION['cart'][$id]['qty'] = $_GET['quantity'];
                $_SESSION['success'] = 'Tạo mới giỏ hàng thành công';
                $_SESSION['cart'][$id]['name'] = $book->getTitle();
                $_SESSION['cart'][$id]['price'] = $book->getPriceValue();
                $_SESSION['cart'][$id]['image'] = $book->getImage();
                $_SESSION['cart'][$id]['quantity'] = $book->getQuantity();
                if($_SESSION['cart'][$id]['qty'] > $book->getQuantity()){
                    $_SESSION['cart'][$id]['qty'] = $book->getQuantity();
                }
                calCart();
                header("Location: ../cart.php");
                exit();
            }
        }else{
            header ("Location: ../cart.php");
        }
    }
