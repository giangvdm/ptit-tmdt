<?php

class Orders {
    private $id;
    private $cusId;
    private $totalAmount;
    private $totalPrice;
    private $createdAt;
    
    function getCusId() {
        return $this->cusId;
    }
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
        function getTotalAmount() {
        return $this->totalAmount;
    }

    function getTotalPrice() {
        return $this->totalPrice;
    }

    function getCreatedAt() {
        return $this->createdAt;
    }

    function setCusId($cusId) {
        $this->cusId = $cusId;
    }

    function setTotalAmount($totalAmount) {
        $this->totalAmount = $totalAmount;
    }

    function setTotalPrice($totalPrice) {
        $this->totalPrice = $totalPrice;
    }

    function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }


}
