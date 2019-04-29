<?php
    session_start();
    require '../model/OrderDao.php';
    require '../model/User.php';
    $user = new User();
    $ordersDao = new OrdersDao();
    $orderDetailDao = new OrdersDetailDao();
    if(isset($_SESSION['user'])){
        $user = unserialize($_SESSION['user']);
        $bookCount = $_SESSION['bookCount'];
        $totalPrice = $_SESSION['totalPrice'];
        $last_id = $ordersDao->addCart($user->getId(),$bookCount,$totalPrice);
        foreach($_SESSION['cart'] as $key=>$value){
            $orderDetailDao->addItem($last_id,$key,$value['qty']);
            unset($key);
            unset($value);
        }
        unset($_SESSION['cart']);
        unset($_SESSION['bookcount']);
        unset($_SESSION['totalPrice']);
        header("Location: ../cart.php");
    }else{
        header("Location: ../login.php");
    }
        
    
   
