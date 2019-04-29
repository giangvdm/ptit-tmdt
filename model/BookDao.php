<?php
    require 'Database.php';
    require 'Book.php';
    
    class BookDAO extends Database
    {
        public function listAllBook()
        {
            $sqlSelectAllBooks = "SELECT * FROM book";

        }

        public function listBookByFilter($category = null, $minPrice = null, $maxPrice = null)
        {
            $this->conn = $this->connect();
            
            $sqlSelectBook = "SELECT * FROM books";
            $sqlSelectBook = $sqlSelectBook . " INNER JOIN book_category ON books.id = book_category.id_book";
            if (isset($category)) {
                $sqlSelectBook = $sqlSelectBook . " WHERE book_category.id_category = $category";
            }
            // if (isset($minPrice)) $sqlSelectBook . " WHERE price BETWEEN $category";
            // if (isset($maxPrice)) $sqlSelectBook . " WHERE price $category";

            $bookList = array();

            if ($stmt = $this->conn->prepare($sqlSelectBook)) {
                // $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows) {
                    $stmt->bind_result($id, $title, $description, $price, $oldPrice, $quantity, $author, $publisher, $isBestSeller, $image, $createdAt, $idBookCat, $idBook, $idCategory);
                    while ($stmt->fetch()) {
                        $book = new Book();
                        $book->setId($id);
                        $book->setTitle($title);
                        $book->setDescription($description);
                        $book->setPrice($price);
                        $book->setOldPrice($oldPrice);
                        $book->setQuantity($quantity);
                        $book->setAuthor($author);
                        $book->setPublisher($publisher);
                        $book->setIsBestSeller($isBestSeller);
                        $book->setImage($image);
                        $book->setCreatedAt($createdAt);
                        
                        $bookList[] = $book;
                    }
                }

                $this->conn->close();
            }

            return $bookList;
        }

        public function listBestSellerBooks()
        {
            $this->conn = $this->connect();
            
            $sqlSelectBestSellerBooks = "SELECT * FROM books WHERE is_best_seller = 1";

            $bestSellerBookList = array();

            if ($stmt = $this->conn->prepare($sqlSelectBestSellerBooks)) {
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows) {
                    $stmt->bind_result($id, $title, $description, $price, $oldPrice, $quantity, $author, $publisher, $isBestSeller, $image, $createdAt);
                    while ($stmt->fetch()) {
                        $book = new Book();
                        $book->setId($id);
                        $book->setTitle($title);
                        $book->setDescription($description);
                        $book->setPrice($price);
                        $book->setOldPrice($oldPrice);
                        $book->setQuantity($quantity);
                        $book->setAuthor($author);
                        $book->setPublisher($publisher);
                        $book->setIsBestSeller($isBestSeller);
                        $book->setImage($image);
                        $book->setCreatedAt($createdAt);
                        
                        $bestSellerBookList[] = $book;
                    }
                }

                $this->conn->close();
            }

            return $bestSellerBookList;
        }

        public function getBookById($id)
        {
            $this->conn = $this->connect();

            $sqlSelectBookById = "SELECT * FROM books WHERE id = ?";

            $book = new Book();

            if ($stmt = $this->conn->prepare($sqlSelectBookById)) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows) {
                    $stmt->bind_result($id, $title, $description, $price, $oldPrice, $quantity, $author, $publisher, $isBestSeller, $image, $createdAt);
                    $stmt->fetch();
                    $book = new Book();
                    $book->setId($id);
                    $book->setTitle($title);
                    $book->setDescription($description);
                    $book->setPrice($price);
                    $book->setOldPrice($oldPrice);
                    $book->setQuantity($quantity);
                    $book->setAuthor($author);
                    $book->setPublisher($publisher);
                    $book->setIsBestSeller($isBestSeller);
                    $book->setImage($image);
                    $book->setCreatedAt($createdAt);
                }

                $this->conn->close();
            }

            if (!$book->getId()) return null; // no book with given ID found

            return $book;
        }
    }