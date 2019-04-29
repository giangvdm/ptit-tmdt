<?php
    require 'Database.php';
    require 'Category.php';

    class CategoryDao extends Database
    {
        public function getAllCategories()
        {
            $this->conn = $this->connect();

            $sqlSelectAllCategories = "SELECT * FROM categories";

            if ($stmt = $this->conn->prepare($sqlSelectAllCategories)) {
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows) {
                    $catList = array();
                    $stmt->bind_result($id, $name);
                    while ($stmt->fetch()) {
                        $category = new Category();
                        $category->setId($id);
                        $category->setName($name);
                        
                        $catList[] = $category;
                    }
                }

                $this->conn->close();
            }

            return $catList;
        }

        public function getCategoriesByBookId($bookId)
        {
            $this->conn = $this->connect();

            $sqlSelectCategoriesByBookId = "SELECT * FROM categories INNER JOIN book_category ON categories.id = book_category.id_category WHERE book_category.id_book = ?";

            $categoryList = array();

            if ($stmt = $this->conn->prepare($sqlSelectCategoriesByBookId)) {
                $stmt->bind_param("i", $bookId);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows) {
                    $stmt->bind_result($id, $name, $idBookCat, $idBook, $idCategory);
                    while ($stmt->fetch()) {
                        $cat = new Category();
                        $cat->setId($id);
                        $cat->setName($name);
                        $categoryList[] = $cat;
                    }
                }

                $this->conn->close();
            }

            return $categoryList;
        }
    }