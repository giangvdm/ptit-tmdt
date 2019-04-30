<?php
    require_once ('Database.php');
    require_once ('OrdersDetail.php');

    class OrdersDetailDao extends Database
    {
        public function addItem($orderId,$bookId,$quantity)
        {
           $this->conn = $this->connect();
           $query = "INSERT INTO orders_detail(order_id,book_id,quantity) VALUES(?,?,?)";
           if($stmt = $this->conn->prepare($query)){
               $stmt->bind_param("iii",$orderId,$bookId,$quantity);
               $stmt->execute();
           }   
        }
        public function getOrderDetail($orderId){
            $this->conn = $this->connect();
            $query = "SELECT * FROM orders_detail WHERE order_id = ?";
            $listOrderDetail = array();
            if($stmt=$this->conn->prepare($query)){
                $stmt->bind_param("i",$orderId);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $orderDetail = new OrdersDetail() ;
                        $orderDetail->setId($row['id']);
                        $orderDetail->setOrderId($row['order_id']);
                        $orderDetail->setBookId($row['book_id']);
                        $orderDetail->setQuantity($row['quantity']);
                        $orderDetail->setCreatedAt($row['created_at']);
                        $listOrderDetail[] = $orderDetail;
                    }
                } 
                $stmt->close();
            }
            $this->conn->close();
            return $listOrderDetail;
        }
    }
