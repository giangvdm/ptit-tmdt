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
            if (isset($category)) $sqlSelectBook = $sqlSelectBook . " WHERE category_id = $category";
            // if (isset($minPrice)) $sqlSelectBook . " WHERE price BETWEEN $category";
            // if (isset($maxPrice)) $sqlSelectBook . " WHERE price $category";

            $bookList = array();

            if ($stmt = $this->conn->prepare($sqlSelectBook)) {
                // $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows) {
                    $stmt->bind_result($id, $title, $description, $price, $quantity, $category, $author, $publisher, $image);
                    while ($stmt->fetch()) {
                        $book = new Book();
                        $book->setId($id);
                        $book->setTitle($title);
                        $book->setDescription($description);
                        $book->setPrice($price);
                        $book->setQuantity($quantity);
                        $book->setCategory($category);
                        $book->setAuthor($author);
                        $book->setPublisher($publisher);
                        $book->setImage($image);
                        
                        $bookList[] = $book;
                    }
                }

                $this->conn->close();
            }

            return $bookList;
        }

        public function getBookById($id)
        {
            $this->conn = $this->connect();
            $sqlSelectBookById = "SELECT * FROM books WHERE id = ?";
            $book = new Book();
            if ($stmt = $mysqli->prepare($query)) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $row = $result->fetch_assoc();

                $book->id = $row['id'];
                $book->title = $row['title'];
                $book->description = $row['description'];
                $book->price = $row['price'];
                $book->quantity = $row['quantity'];
                $book->author = $row['author'];
                $book->publisher = $row['publisher'];
                $book->image = $row['image'];

                $mysqli->close($stmt);
            }

            return $book;
         }
    }