<?php
    class Database
    {
        private $hostName = 'localhost';
        private $userName = 'root';
        private $password = '';
        private $dbName = 'bookstor';
        
        private $conn = null;
        
        public function connect()
        {
            $this->conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
            if (!$this->conn) {
                exit();
            }
            else {
                mysqli_set_charset($this->conn, 'utf8');
            }

            return $this->conn;
        }
        
        public function closeConn()
        {
            if($this->conn) {
                mysqli_close($this->conn);
            }
        }
    }
