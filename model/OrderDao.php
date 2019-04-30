<?php
    require 'Orders.php';
    require 'OrdersDetailDao.php';
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

        public function listOrderByCustomerId($cusId)
        {
            $this->conn = $this->connect();

            $sqlSelectOrderByCusId = "SELECT * FROM orders WHERE customer_id = ?";

            $orderList = array();

            if ($stmt = $this->conn->prepare($sqlSelectOrderByCusId)) {
                $stmt->bind_param("i", $cusId);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows) {
                    $stmt->bind_result($id, $cusId, $amount, $price, $createdAt, $status);
                    while ($stmt->fetch()) {
                        $order = new Orders();
                        $order->setId($id);
                        $order->setCusId($cusId);
                        $order->setTotalAmount($amount);
                        $order->setTotalPrice($price);
                        $order->setCreatedAt($createdAt);
                        $order->setStatus($status);
                        
                        $orderList[] = $order;
                    }
                }
            }

            $this->conn->close();
            
            return $orderList;
        }
    }
