<?php 
    class Db 
    {
        private $host;
        private $username;
        private $dbname;
        private $password;
        public $con;

        //database connect function
        public function __construct() 
        {
            $this->connect();
        }

        //connecting to datbase
        public function connect()
        {
            try {
                $this->host="localhost";
                $this->username="root";
                $this->password="";
                $this->dbname="messaging";
                $this->con = new mysqli($this->host,$this->username,$this->password,$this->dbname,'3308');
                if ($this->con->connect_error) {
                    die ("Connection failed: ".$this->con->connect_error);
                }
                return $this->con;
            } catch (Exception $e) {
                echo "There is some problem in connection: " . $e->getMessage();
            }
        }
    }
?>