<?php
    session_start();
    if (isset($_GET['category'])) {
        require '../model/BookDao.php';

        $category = $_GET['category'];
        $bookDao = new BookDAO();

        $bookList = array();
        $orderBy = 'none';
        if (isset($_GET['order-by'])) $orderBy = $_GET['order-by'];

        if ($orderBy != null || $orderBy != 'none') {
            $bookList = $bookDao->listBookByFilter($category, $orderBy);
        }
        else {
            $bookList = $bookDao->listBookByFilter($category);
        }

        var_dump($orderBy);

        // $_SESSION['bookList'] = null;
        $_SESSION['bookList'] = $bookList;
        // var_dump($bookList);
        header('location:../product-list.php?category=' . $category . "&order-by=" . $orderBy);
    }
    
    if (isset($_GET['id'])) {
        require '../model/BookDao.php';
        
        $bookId = $_GET['id'];
        $bookDao = new BookDAO();
        $currentBook = $bookDao->getBookById($bookId);
        $relatedBookList = $bookDao->listRelatedBooks($currentBook->getCategories()[0], 6);
        // $relatedBookList = $currentBook->getCategories()[0];
        $bestSellerBookList = $bookDao->listBestSellerBooks(6);
        
        $_SESSION['currentlyViewedBook'] = $currentBook;
        $_SESSION['relatedBookList'] = $relatedBookList;
        $_SESSION['bestSellerBookList'] = $bestSellerBookList;
        // var_dump($currentBook);
        header('location:../product-detail.php?id=' . $bookId);
    }