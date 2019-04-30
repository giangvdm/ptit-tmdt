<?php
    require_once 'Orders.php';
    require_once 'OrdersDetailDao.php';
    require_once('Database.php');

    class OrdersDao extends Database
    {
        public function addCart($cusId, $bookCount, $totalPrice)
        {
           $this->conn = $this->connect();
           $query = "INSERT INTO orders(customer_id, total_amount, total_price) VALUES(?, ?, ?)";
           if ($stmt = $this->conn->prepare($query)) {
               $stmt->bind_param("iii", $cusId, $bookCount, $totalPrice);
               $stmt->execute();
           }
            $last_id = mysqli_insert_id($this->conn);
            return $last_id;
        }

       public function getOrderByCusId($cusId){
        $this->conn = $this->connect();
        $query = "SELECT * FROM orders WHERE customer_id = ?";
        $allOrders = array();
        if($stmt=$this->conn->prepare($query)){
            $stmt->bind_param("i",$cusId);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $orders = new Orders() ;
                    $orders->setId($row['id']);
                    $orders->setCusId($row['customer_id']);
                    $orders->setTotalAmount($row['total_amount']);
                    $orders->setTotalPrice($row['total_price']);
                    $orders->setCreatedAt($row['created_at']);
                    $orders->setStatus($row['status']);
                    $allOrders[] = $orders;
                }
            } 
            $stmt->close();
        }
        $this->conn->close();
        return $allOrders;
        }
    }
