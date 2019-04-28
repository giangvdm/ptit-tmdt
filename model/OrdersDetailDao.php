<?php
    require ('Database.php');
    class OrdersDetailDao extends Database{
        public function addItem($orderId,$bookId,$quantity){
           $this->conn = $this->connect();
           $query = "INSERT INTO orders_detail(order_id,book_id,quantity) VALUES(?,?,?)";
           if($stmt = $this->conn->prepare($query)){
               $stmt->bind_param("iii",$orderId,$bookId,$quantity);
               $stmt->execute();
           }   
        }
    }
