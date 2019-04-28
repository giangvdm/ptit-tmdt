<?php
    require '../model/OrdersDetailDao.php';
    class OrdersDao extends Database{
        public function addCart($cusId,$bookCount,$totalPrice){
           $this->conn = $this->connect();
           $query = "INSERT INTO orders(customer_id,total_amount,total_price) VALUES(?,?,?)";
           if($stmt = $this->conn->prepare($query)){
               $stmt->bind_param("iii",$cusId,$bookCount,$totalPrice);
               $stmt->execute();
           }
            $last_id = mysqli_insert_id($this->conn);
            return $last_id;
        }
    }
