<?php
    require_once('Database.php');
    require 'Book.php';
    
    class BookDAO extends Database
    {
        public function updateQuantity($bookId,$quantity){
            $this->conn = $this->connect();
            $query = "UPDATE books SET quantity=? WHERE id=?";
            if($stmt = $this->conn->prepare($query)){
                $stmt->bind_param("ii",$quantity,$bookId);
                $stmt->execute();
                $stmt->close();
            }
            $this->conn->close();
        }
        public function getBookById2($id){
            $this->conn = $this->connect();
            $query = "SELECT * FROM books WHERE id = ?";
            $param = $id;
            $book = null;
            if($stmt=$this->conn->prepare($query)){
                $stmt->bind_param("i",$param);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $book = new Book() ;
                        $book->setId($row['id']);
                        $book->setTitle($row['title']);
                        $book->setDescription($row['description']);
                        $book->setPrice($row['price']);
                        $book->setOldPrice($row['old_price']);
                        $book->setQuantity($row['quantity']);
                        $book->setAuthor($row['author']);
                        $book->setPublisher($row['publisher']);
                        $book->setIsBestSeller($row['is_best_seller']);
                        $book->setImage($row['image']);
                    }
                } 
                $stmt->close();
            }
           
            $this->conn->close();
            return $book;
        }

        // public function listAllBook()
        // {
        //     $sqlSelectAllBooks = "SELECT * FROM book";

        // }

        public function listBookByFilter($category = null, $orderBy = null, $limit = null)
        {
            $this->conn = $this->connect();
            
            $sqlSelectBook = "SELECT * FROM books";
            $sqlSelectBook = $sqlSelectBook . " INNER JOIN book_category ON books.id = book_category.id_book";
            if (isset($category)) {
                $sqlSelectBook = $sqlSelectBook . " WHERE book_category.id_category = $category";
            }
            if (isset($orderBy)) {
                switch ($orderBy) {
                    case 'date':
                        $sqlSelectBook = $sqlSelectBook . " ORDER BY books.created_at DESC";
                        break;
                    case 'price-low':
                        $sqlSelectBook = $sqlSelectBook . " ORDER BY books.price ASC";
                        break;
                    case 'price-high':
                        $sqlSelectBook = $sqlSelectBook . " ORDER BY books.price DESC";
                        break;
                    default:
                        break;
                }
            }
                
            if ($limit != null) {
                $sqlSelectBook = $sqlSelectBook . " LIMIT $limit";
            }

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

        public function listBestSellerBooks($limit)
        {
            $this->conn = $this->connect();
            
            $sqlSelectBestSellerBooks = "SELECT * FROM books WHERE is_best_seller = 1 LIMIT ?";

            $bestSellerBookList = array();

            if ($stmt = $this->conn->prepare($sqlSelectBestSellerBooks)) {
                $stmt->bind_param("i", $limit);
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
            }

            $this->conn->close();

            return $bestSellerBookList;
        }

        public function listRelatedBooks($category, $currentBookId, $limit)
        {
            $this->conn = $this->connect();
            
            $sqlSelectRelatedBooks = "SELECT * FROM books INNER JOIN book_category ON books.id = book_category.id_book WHERE book_category.id_category = ? AND NOT book_category.id_book = ? LIMIT ?";

            $relatedBookList = array();

            if ($stmt = $this->conn->prepare($sqlSelectRelatedBooks)) {
                $stmt->bind_param("iii", $category, $currentBookId, $limit);
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
                        
                        $relatedBookList[] = $book;
                    }
                }
            }

            $this->conn->close();

            if (count($relatedBookList) == 0) return null;
            return $relatedBookList;
        }

        public function listNewBooks($limit)
        {
            $this->conn = $this->connect();

            $sqlSelectBooksByClosestDate = "SELECT * FROM books ORDER BY created_at DESC LIMIT ?";

            $newBookList = array();

            if ($stmt = $this->conn->prepare($sqlSelectBooksByClosestDate)) {
                $stmt->bind_param("i", $limit);
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
                        
                        $newBookList[] = $book;
                    }
                }

                $this->conn->close();
            }

            return $newBookList;
        }

        public function getBookById($id)
        {
            $this->conn = $this->connect();

            $sqlGetBookCategories = "SELECT book_category.id_category FROM books INNER JOIN book_category ON books.id = book_category.id_book WHERE books.id = ?";

            $categoryList = array();

            if ($stmt = $this->conn->prepare($sqlGetBookCategories)) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows) {
                    $stmt->bind_result($idCategory);
                    while ($stmt->fetch()) {
                        $categoryList[] = $idCategory;
                    }
                }

                $stmt->free_result();
            }

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
                    $book->setCategories($categoryList);
                }

                $this->conn->close();
            }

            if (!$book->getId()) return null; // no book with given ID found

            return $book;
        }

        public function searchBookByName($title, $orderBy = null)
        {
            $this->conn = $this->connect();

            $sqlSelectBookByTitle = "SELECT * FROM books WHERE title LIKE ?";
            if (isset($orderBy)) {
                switch ($orderBy) {
                    case 'date':
                        $sqlSelectBookByTitle = $sqlSelectBookByTitle . " ORDER BY created_at DESC";
                        break;
                    case 'price-low':
                        $sqlSelectBookByTitle = $sqlSelectBookByTitle . " ORDER BY price ASC";
                        break;
                    case 'price-high':
                        $sqlSelectBookByTitle = $sqlSelectBookByTitle . " ORDER BY price DESC";
                        break;
                    default:
                        break;
                }
            }

            $param = "%$title%";

            if ($stmt = $this->conn->prepare($sqlSelectBookByTitle)) {
                $stmt->bind_param("s",$param);
                $stmt->execute();
                $result = $stmt->get_result();
                $searchResult = array();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $book = new Book() ;
                        $book->setId($row['id']);
                        $book->setTitle($row['title']);
                        $book->setDescription($row['description']);
                        $book->setPrice($row['price']);
                        $book->setOldPrice($row['old_price']);
                        $book->setQuantity($row['quantity']);
                        $book->setAuthor($row['author']);
                        $book->setPublisher($row['publisher']);
                        $book->setIsBestSeller($row['is_best_seller']);
                        $book->setImage($row['image']);
                        $searchResult[] = $book;
                    }
                } 
                $stmt->close();
            }
           
            $this->conn->close();

            return $searchResult;
        }
    }
