<?php
    session_start();
    if (isset($_GET['category'])) {
        require '../model/BookDao.php';

        $category = $_GET['category'];
        $demo = new BookDao();
        $bookList = $demo->listBookByFilter($category);

        $_SESSION['bookList'] = $bookList;
        // var_dump($bookList);
        header('location:../product-list.php?category=' . $category);
    }