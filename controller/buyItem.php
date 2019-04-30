<?php
    session_start();
    require_once '../model/OrdersDao.php';
    require_once '../model/User.php';
    require_once '../include/sendMail.php';

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
    smtpmailer($user->getEmail(), "sale@ptitbook.com", "PTIT Books", "Cảm ơn bạn đã liên hệ", "Chúng tôi sẽ liên hệ lại với bạn sớm nhất có thể");

    }else{
        header("Location: ../login.php");
    }
    
        
    
   
