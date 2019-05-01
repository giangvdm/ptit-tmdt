<?php

require 'User.php';
require 'Database.php';

class UserDao extends Database
{
    public function loginCheck($username,$password)
    {
        $this->conn = $this->connect();
		$query = "SELECT * FROM users WHERE accname = ? ";
        $users = null ;
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        if( $result == null){
            return Null;
        }
        else{
            $row = $result->fetch_assoc();
            if ($row['password']!=$password) {
                # code...
                return null;
            }else {
                $users = new User() ;
                $users->setId($row['id']);
                $users->setAccname($row['accname']);
                $users->setName($row['name']);
                $users->setPassword($row['password']);
                $users->setEmail($row['email']);
                $users->setAddress($row['address']);
                return $users;
            }
        }
        
    }

    public function register($accname,$password,$name,$email,$address){
        $this->conn = $this->connect();
        $query = "INSERT into users (accname,name,password,email,address)
        VALUES(?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssss",$accname,$name,$password,$email,$address);
        $stmt->execute();
        $stmt->close();
        $this->conn->close();
    }

    public function getAllUser(){
        $this->conn = $this->connect();
        $query = "SELECT * FROM users";
        if($stmt=$this->conn->prepare($query)){
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                $allUser = array();
                while($row = $result->fetch_assoc()){
                    $users = new User() ;
                    $users->setId($row['id']);
                    $users->setAccname($row['accname']);
                    $users->setName($row['name']);
                    $users->setPassword($row['password']);
                    $users->setEmail($row['email']);
                    $users->setAddress($row['address']);
                    $allUser[] = $users;
                }
            } 
        }
        $stmt->close();
        $this->conn->close();
        return $allUser;
    }

    public function changePassword($oldPass, $newPass, $id)
    {
        $this->conn = $this->connect();

        $sqlGetCustomerPasswordById = "SELECT password FROM users WHERE id = ?";

        $currentPassword = null;

        if ($stmt = $this->conn->prepare($sqlGetCustomerPasswordById)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows) {
                $stmt->bind_result($password);
                $stmt->fetch();

                $currentPassword = $password;
                if ($currentPassword != $oldPass) {
                    $this->conn->close();
                    return false;
                }
            }
        }

        $stmt->free_result();

        $sqlUpdatePassword = "UPDATE users SET password = ? WHERE id = ?";

        if ($stmt = $this->conn->prepare($sqlUpdatePassword)) {
            $stmt->bind_param("si", $newPass, $id);
            if ($stmt->execute()) {
                $this->conn->close();
                return true;
            }
            else {
                $this->conn->close();
                return false;
            }
        }
    }

    public function updateCustomerInfo($id, $arr)
    {
        $this->conn = $this->connect();

        $sqlUpdateCustomerInfo = "UPDATE users SET accname = ?, name = ?, email = ?, address = ? WHERE id = ?";

        $oldAddress = $arr['address'];
        $newAddress = explode("-", $arr['address'])[0];

        if (isset($arr['ward'])) {
            $newAddress = $newAddress . "-" . $arr['ward'];
        }
        if (isset($arr['district'])) {
            $newAddress = $newAddress . "-" . $arr['district'];
        }
        if (isset($arr['province'])) {
            $newAddress = $newAddress . "-" . $arr['province'];
        }

        if (!isset($arr['ward']) && !isset($arr['district']) && !isset($arr['province'])) $newAddress = $oldAddress;

        if ($stmt = $this->conn->prepare($sqlUpdateCustomerInfo)) {
            $stmt->bind_param("ssssi", $arr['username'], $arr['name'], $arr['email'], $newAddress, $id);

            if ($stmt->execute()) {
                $this->conn->close();
                return true;
            }
            else {
                $this->conn->close();
                return false;
            }
        }

    }
}
