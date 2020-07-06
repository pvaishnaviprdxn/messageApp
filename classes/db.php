<?php 
    class Dbc 
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

        //user check
        public function registeredUser($uemail)
        {
            $user = $this->con->query("SELECT * FROM users WHERE email='".$uemail."'");
            if ($user->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        }

        //add users
        public function addUsers($ufname, $ulname, $email, $phone, $ucpassword) {
            $add = "INSERT INTO users(first_name, last_name, email, phone, password) VALUES ('".$ufname."', '".$ulname."', '".$email."', '".$phone."', '".$ucpassword."')";
            return $add;
        }

        public function userExists($uemail,$upass) 
        {
            $result = $this->con->query("SELECT * FROM USERS WHERE email='".$uemail."' AND password='".$upass."'");
            if($result->num_rows > 0) {
                if($row = $result->fetch_assoc()) {
                    return $row;
                }
            } else {
                return false;
            }
        }

        public function session() 
        {
            if(isset($_SESSION['login'])) {
                return $_SESSION['login'];
            }
        }

        public function showUsers() 
        {
            $users = "SELECT id,first_name,last_name,email,phone FROM USERS";
            $res = $this->con->query($users);
            return $res;
        }

    }
?>