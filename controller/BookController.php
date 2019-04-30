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

        $_SESSION['bookList'] = $bookList;
        header('location:../product-list.php?category=' . $category . "&order-by=" . $orderBy);
    }
    
    if (isset($_GET['id'])) {
        require '../model/BookDao.php';
        
        $bookId = $_GET['id'];
        $bookDao = new BookDAO();

        $currentBook = $bookDao->getBookById($bookId);
        $relatedCategory = $currentBook->getCategories()[0];
        $relatedBookList = $bookDao->listRelatedBooks($relatedCategory, $currentBook->getId(), 6);
        $bestSellerBookList = $bookDao->listBestSellerBooks(6);
        
        $_SESSION['currentlyViewedBook'] = $currentBook;
        $_SESSION['relatedBookList'] = $relatedBookList;
        $_SESSION['bestSellerBookList'] = $bestSellerBookList;
        // var_dump($relatedBookList);
        header('location:../product-detail.php?id=' . $bookId);
    }

    if (isset($_GET['search-query'])) {
        require '../model/BookDao.php';
        
        $searchQuery = $_GET['search-query'];
        $bookDao = new BookDAO();

        $searchResults = $bookDao->searchBookByName($searchQuery);

        $_SESSION['searchResults'] = $searchResults;

        header('location:../product-list.php?search-query=' . $searchQuery);
    }