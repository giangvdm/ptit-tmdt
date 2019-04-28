<?php
    session_start();
    if (isset($_GET['category'])) {
        require '../model/BookDao.php';

        $category = $_GET['category'];
        $bookDao = new BookDAO();
        $bookList = $bookDao->listBookByFilter($category);

        // $_SESSION['bookList'] = null;
        $_SESSION['bookList'] = $bookList;
        // var_dump($bookList);
        header('location:../product-list.php?category=' . $category);
    }
    
    if (isset($_GET['id'])) {
        require '../model/BookDao.php';
        
        $bookId = $_GET['id'];
        $bookDao = new BookDAO();
        $currentBook = $bookDao->getBookById($bookId);
        $relatedBookList = null;
        $bestSellerBookList = $bookDao->listBestSellerBooks();
        
        $_SESSION['currentlyViewedBook'] = $currentBook;
        $_SESSION['relatedBookList'] = $relatedBookList;
        $_SESSION['bestSellerBookList'] = $bestSellerBookList;
        // var_dump($currentBook);
        header('location:../product-detail.php?id=' . $bookId);
    }