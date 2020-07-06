<?php 
    require_once 'database.php';
    class Validation 
    {
        public $fnameError = '';
        public $lnameError = '';
        public $emailError = '';
        public $phoneError = '';
        public $passwError = '';
        public $cpasswError = '';
        public $loginStatus = '';
        public $registerStatus = '';
        protected $firstName = '';
        protected $lastName = '';
        protected $email = '';
        protected $phone = ''; 
        protected $password = ''; 
        protected $cpassword = '';
        protected $rememberStatus = '';
        //validation pattern
        public $namesPattern = "/^[A-Za-z]{2,20}$/";
        public $emailPattern = "/^([0-9a-zA-Z\_\.\-]+)@([0-9a-zA-Z\_\.\-]+)\.([a-zA-Z]+)$/";
        public $phonePattern = "/^[0-9]{10,10}$/";
        public $passwordPattern = "/((?=.*[!@#$%^&*])(?=.*[0-9])(?=.*[a-zA-Z])){4,15}/";


        public function validateFirstName($fname) {
            $this->firstName = $fname;
            if (empty($this->firstName)) {
                $this->fnameError = "*First name required";
            } else {
                if (!preg_match($this->namesPattern,$this->firstName)) {
                    $this->fnameError = "*Name name must contain alphabets only";
                }
            }
        }

        public function validateLastname($flname) 
        {
            $this->lastName = $flname;
            if(empty($this->lastName)) {
                $this->lnameError = "*Last name required";
            } else {
                if(!preg_match($this->namesPattern,$this->lastName)) {
                    $this->lnameError = "*Last name must contain alphabets only";
                }
            }
        }

        public function validateEmail($femail) 
        {
            $this->email = $femail;
            if (empty($this->email)) {
                $this->emailError = "*Email required";
            }
            else {
                if (!preg_match($this->emailPattern,$this->email)) {
                    $this->emailError = "*Email must be in form name12@example.com";
                }
            }
        }

        public function validatePhone($fphone)
        {
            $this->phone = $fphone;
            if (empty($this->phone)) {
                $this->phoneError = "Phone no. must not be empty";
            } else {
                if (!preg_match($this->phonePattern,$this->phone)) {
                    $this->phoneError = "Phone no. must contain only 10 digits";
                }
            }
        }

        public function validatepassword($fpass) 
        {
            $this->password = $fpass;
            if (empty($this->password )) {
                $this->passwError = "*Please create password to go ahead";
            }
            else{
                if (!preg_match($this->passwordPattern,$this->password)) {
                    $this->passwError = "*Your password must contain atleast 1 capital letter, 1 digit and 1 special character.";
                }
            }
        }

        public function validateConfirmPass($fpass,$fcpass) 
        {
            $this->cpassword = $fcpass;
            if(empty($this->cpassword)) {
                $this->cpasswError = "*Password required";
            }
            else{
                if($this->cpassword !== $fpass) {
                    $this->cpasswError = "*Please enter the same as above";
                }
            }
        }
        
        public function registerForm() 
        {
            $this->validateFirstName($_POST["fname"]);
            $this->validateLastName($_POST["lname"]);
            $this->validateEmail($_POST["email"]);
            $this->validatePhone($_POST["phone"]);
            $this->validatepassword($_POST["password"]);
            $this->validateConfirmPass($_POST["password"],$_POST["cpassword"]);
            
            if ($this->fnameError == '' && $this->lnameError == '' && $this->emailError == '' && $this->usernameError == '' && $this->cpasswError == '') {
              /*  $db = new Dbc();
                $this->formCpassword= password_hash($this->formCpassword,PASSWORD_DEFAULT);
                $existing = $db->existingUser($this->formUsername);

                if ($existing ==  true) {
                    header("location:./login-page.php");
                } else {
                    $reg = $db->registerUser($this->formfName,$this->formlName,$this->formEmail,$this->formUsername,$this->formCpassword);
                    $db->con->query($reg); 
                    header("location:./login-page.php");
                }*/ 
            }
        }
    }
?>