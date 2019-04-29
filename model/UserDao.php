<?php

require 'User.php';
require 'Database.php';

class UserDao extends Database
{
    public function loginCheck($username,$password){
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
}
