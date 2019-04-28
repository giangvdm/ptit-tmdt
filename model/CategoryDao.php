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
    }