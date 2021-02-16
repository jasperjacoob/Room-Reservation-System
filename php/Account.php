<?php 
    class Account{
        public $emailAddress;
        public $accountID;
        public $firstName;
        public $middleName;
        public $lastName;
        public $courseID;
        public $yearID;
        public $birthday;
        public $password;
        function __construct($accountID,$emailAddress,$firstName,$middleName,$lastName,$courseID,$yearID,$birthday,$password)
        {
            $this->emailAddress = $emailAddress;
            $this->yearID = $yearID;
            $this->accountID = $accountID;
            $this->firstName = $firstName;
            $this->middleName = $middleName;
            $this->lastName = $lastName;
            $this->courseID = $courseID;
            $this->birthday = $birthday;
            $this->password = $password;
        }
    }

?>