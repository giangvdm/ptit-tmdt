<?php
    session_start();

    if (!isset($_GET['id'])) {
        require '../model/OrderDao.php';
        require '../model/User.php';

        $orderDao = new OrdersDao();

        $orderList = array();

        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            $orderList = $orderDao->listOrderByCustomerId($user->getId());
            $_SESSION['orderList'] = $orderList;

            header('location:../order-history.php');
        }
        else {
            // customer not signed in
            header('location:../login.php');
        }
    }
    
    if (isset($_GET['id'])) {
        // require '../model/BookDao.php';
        
        // $bookId = $_GET['id'];
        // $bookDao = new BookDAO();
        // $currentBook = $bookDao->getBookById($bookId);
        // $relatedBookList = $bookDao->listRelatedBooks($currentBook->getCategories()[0], 6);
        // // $relatedBookList = $currentBook->getCategories()[0];
        // $bestSellerBookList = $bookDao->listBestSellerBooks(6);
        
        // $_SESSION['currentlyViewedBook'] = $currentBook;
        // $_SESSION['relatedBookList'] = $relatedBookList;
        // $_SESSION['bestSellerBookList'] = $bestSellerBookList;
        // // var_dump($currentBook);
        // header('location:../product-detail.php?id=' . $bookId);
    }