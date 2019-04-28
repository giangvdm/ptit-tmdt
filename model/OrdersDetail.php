<?php

    class OrdersDetail {
        private $id;
        private $orderId;
        private $bookId;
        private $quantity;
        private $createdAt;
        
        function getId() {
            return $this->id;
        }

        function getOrderId() {
            return $this->orderId;
        }

        function getBookId() {
            return $this->bookId;
        }

        function getQuantity() {
            return $this->quantity;
        }

        function getCreatedAt() {
            return $this->createdAt;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setOrderId($orderId) {
            $this->orderId = $orderId;
        }

        function setBookId($bookId) {
            $this->bookId = $bookId;
        }

        function setQuantity($quantity) {
            $this->quantity = $quantity;
        }

        function setCreatedAt($createdAt) {
            $this->createdAt = $createdAt;
        }


    }