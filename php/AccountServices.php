<?php 
    class AccountServices{
        public $conn;
        function __construct(mysqli $conn)
        {
            $this->conn = $conn;
        }
        function CheckAccountID($accountID,$accountType){
            $query = "SELECT `".ucfirst($accountType)."ID` FROM `tbl_".$accountType."` WHERE `".ucfirst($accountType)."ID` = '".$accountID."'";
            $res = $this->conn->query($query);
            $ID = $res->fetch_row();
            if(empty($ID)){
                return true;
            }else{
                return false;
            }
        }
        function AddAccount(Account $account,$accountType){
                $query = "";
                if($accountType=="student"){   
                    $query = "INSERT INTO `tbl_".$accountType."`(`".ucfirst($accountType)."ID`,`EmailAddress`, `FirstName`, `MiddleName`, `LastName`, `CourseID`, `YearID`,`Birthday`, `Password`) VALUES ('".$account->accountID."','".$account->emailAddress."','".$account->firstName."','".$account->middleName."','".$account->lastName."','".$account->courseID."','".$account->yearID."','".$account->birthday."','".$account->password."')";
                }else{
                    $query = "INSERT INTO `tbl_".$accountType."`(`".ucfirst($accountType)."ID`, `EmailAddress`,`FirstName`, `MiddleName`, `LastName`, `Birthday`, `Password`) VALUES ('".$account->accountID."','". $account->emailAddress ."','".$account->firstName."','".$account->middleName."','".$account->lastName."','".$account->birthday."','".$account->password."')";
                }
                
                if($this->CheckAccountID($account->accountID,$accountType)){
                    $this->conn->query($query);
                    if(empty($this->conn->error)){
                        echo "SUCCESSFUL"; 
                    }else{
                        echo $this->conn->error;
                    }
                    
                }else{
                    echo "ACCOUNT ID ALREADY REGISTERED";
                }
           
           
            
        }
        function EditAccount(Account $account){
            $query = "UPDATE ";
        }
        function LoginAccount($username,$password,$accountType){
            $query = "SELECT `".ucfirst($accountType)."ID` FROM `tbl_".$accountType."` WHERE `".ucfirst($accountType)."ID` = '".$username."' AND `Password` = '" .$password."'";
            $res = $this->conn->query($query);
            $row = $res->fetch_row();
            if(isset($row)){
                echo "SUCCESSFUL"; 
            }else{
                echo "USER NOT FOUND";
            }
        }
        function GetAccountName($accountID,$accountType){
            $query = "SELECT `".ucfirst($accountType)."ID` , `FirstName` , `LastName` FROM `tbl_".$accountType."` WHERE `".ucfirst($accountType)."ID` = '".$accountID."'";
            $res = $this->conn->query($query);
            if($res->num_rows!=0){    
                $row = $res->fetch_row();
                $acc = [];
                if(isset($row)){
                    array_push($acc, $row[1] . " " .$row[2],$row[0]);
                }
                echo json_encode($acc);
            }
        }
        function PopulateCourse(){
            $query = "SELECT * FROM `tbl_course`";
            $res = $this->conn->query($query);
            $course = [];
            while($row = $res->fetch_assoc()){
                $course[$row['CourseID']] = $row['Description'];
            }
            echo json_encode($course);
        }
        function PopulateYear(){
            $query = "SELECT `YearID`, `Description` FROM `tbl_year`";
            $res = $this->conn->query($query);
            $year = [];
            while($row = $res->fetch_assoc()){
                $year[$row['YearID']] = $row['Description'];
            }
            echo json_encode($year);
       
        }
        function PopulateProfessor(){
            $query = "SELECT `FacultyID`, `FirstName`, `LastName` FROM `tbl_faculty`";
            $res = $this->conn->query($query);
            $prof = [];
            if($res->num_rows > 0){         
                while($row = $res->fetch_assoc()){
                    $prof[$row['FacultyID']] = array($row['FirstName'],$row['LastName']);
                }
                echo json_encode($prof);
            }else{
                echo "NO REGISTERED PROF";
            }
        }
        function PopulateSubject(){
            $query = "SELECT `SubjectID`, `Description` FROM `tbl_subject`";
            $res = $this->conn->query($query);
            $subj = [];
            while($row = $res->fetch_assoc()){
                $subj[$row['SubjectID']] = $row['Description'];
            }
            echo json_encode($subj);
            
        }
        function FindMatchEmailAdd($accountID,$emailAddress,$accountType){
            $query = "SELECT `".ucfirst($accountType)."ID`, `FirstName` FROM `tbl_".$accountType."` WHERE `".ucfirst($accountType)."ID` = '".$accountID."' AND `EmailAddress` = '" . $emailAddress. "'";
            $res = $this->conn->query($query);
            $row = $res->fetch_row();
            if(isset($row)){
                return array($row[0],$row[1],$accountType);
            }
            return "ACCOUNT NOT FOUND OR EMAIL ADDRESS IS NOT REGISTERED WITH THIS ACCOUND ID";
        }
        function ChangePassword($accountID,$accountType,$password){
            $query = "UPDATE `tbl_".$accountType."` SET `Password`= '".$password."' WHERE `".ucfirst($accountType)."ID` ='".$accountID."'";
            $this->conn->query($query);
            if(isset($this->conn->error)){
                echo "SUCCESS";
            }else{
                echo $this->conn->error;
            }
            
        }
    }

?>