<?php
    class User {
        private $id;
        private $accname;
        private $name;
        private $password;
        private $email;
        private $address;
        
        
        function getId() {
            return $this->id;
        }
        function getAccname() {
            return $this->accname;
        }
        function getName() {
            return $this->name;
        }
        function getPassword() {
            return $this->password;
        }
        function getEmail() {
            return $this->email;
        }
        function getAddress() {
            return $this->address;
        }
        function setId($id) {
            $this->id = $id;
        }
        function setAccname($accname) {
            $this->accname = $accname;
        }
        function setName($name) {
            $this->name= $name;
        }
        function setPassword($password) {
            $this->password= $password;
        }
        function setEmail($email) {
            $this->email= $email;
        }
        function setAddress($address) {
            $this->address = $address;
        }
        
    }