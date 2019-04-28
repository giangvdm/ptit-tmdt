<?php
    session_start();
    require '../model/OrderDao.php';
    $ordersDao = new OrdersDao();
    $orderDetailDao = new OrdersDetailDao();
    $cusId = 1;
    $bookCount = $_SESSION['bookCount'];
    $totalPrice = $_SESSION['totalPrice'];
    $last_id = $ordersDao->addCart($cusId,$bookCount,$totalPrice);
    foreach($_SESSION['cart'] as $key=>$value){
         $orderDetailDao->addItem($last_id,$key,$value['qty']);
        unset($key);
        unset($value);
    }
    unset($_SESSION['cart']);
    unset($_SESSION['bookcount']);
    unset($_SESSION['totalPrice']);
    header("Location: ../cart.php");
    
   
