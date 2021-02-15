<?php
    include 'Account.php';
    include 'AccountServices.php';
    include 'ReservationServices.php';
   // include 'Mailer.php';
    $conn = new mysqli("localhost","root","","db_roomreservation");
    if($conn->error){
        echo $conn->error;
    }
    $accServices = new AccountServices($conn);
    $reserveServices = new ReservationServices($conn);
    
    if(isset($_POST['btn_name'])){
        $btn_name = $_POST['btn_name'];
        switch($btn_name){
            default:
            case "btn_register":
                if(isset($_POST['Year'])&&isset($_POST['Course'])){
                    $accServices->AddAccount(new Account($_POST['Username'],$_POST['EmailAddress'],$_POST['Firstname'],$_POST['Middlename'],$_POST['Lastname'],$_POST['Course'],$_POST['Year'],$_POST['Birthday'],$_POST['Password']),$_POST['AccountType']);    
                }else{
                    $accServices->AddAccount(new Account($_POST['Username'],$_POST['EmailAddress'],$_POST['Firstname'],$_POST['Middlename'],$_POST['Lastname'],"","",$_POST['Birthday'],$_POST['Password']),$_POST['AccountType']);    
                }
                break;
            case "btn_login":
                $accServices->LoginAccount($_POST['Username'],$_POST['Password'],$_POST['AccountType']);
                break;
            case "btn_reserve":
                if(isset($_POST['Equipment'])){
                    if(isset($_POST['StudNum'])){
                        $reserveServices->Reserve(new Room("",$_POST['Date'],$_POST['Timein'],$_POST['Timeout'],"",$_POST['Course'],$_POST['Year'],$_POST['Professor']),$_POST['Equipment'],$_POST['StudNum']);
                    }else{
                        $reserveServices->Reserve(new Room("",$_POST['Date'],$_POST['Timein'],$_POST['Timeout'],"",$_POST['Course'],$_POST['Year'],$_POST['Professor']),$_POST['Equipment'],null);
                    }
                    
                }else{
                    if(isset($_POST['StudNum'])){
                        $reserveServices->Reserve(new Room($_POST['RoomNum'],$_POST['Date'],$_POST['Timein'],$_POST['Timeout'],$_POST['SubjectCode'],$_POST['Course'],$_POST['Year'],$_POST['Professor']),null,$_POST['StudNum']);
                    }else{
                        $reserveServices->Reserve(new Room($_POST['RoomNum'],$_POST['Date'],$_POST['Timein'],$_POST['Timeout'],$_POST['SubjectCode'],$_POST['Course'],$_POST['Year'],$_POST['Professor']),null,null);
                    }
                    
                }
                
                break;
        }
    }
    if(isset($_GET['get_code'])){
        switch($_GET['get_code']){
            default:
            case 0:
                $accServices->PopulateCourse();
                break;
            case 1:
                $reserveServices->PopulateRoom();
                break;
            case 2:
                $accServices->PopulateYear();
                break;
            case 4:
                $accServices->PopulateProfessor();
                break;
            case 5:
                
                $reserveServices->GetReservationOfCurrentMonth($_GET['month'],$_GET['year']);
                break;
            case 6:
                $ID = $reserveServices->GetReserveViaDescription($_GET['Desc']);
                $reserveServices->GetReservationOfCurrentRoom($ID[0],$_GET['Date']);
                break;
            case 7:
                $accServices->PopulateSubject();
                break;
            case 8:
                $accServices->GetAccountName($_GET['ID'],$_GET['AccType']);
                break;
            case 9:
                //SendMail("geraldorzal18@gmail.com","gerald");
                
                break;
            case 10:
                $reserveServices->GetAllEquipment();
                break;
            case 11:
                if(isset($_GET['StudNum'])){
                    $reserveServices->GetMyReservation($_GET['StudNum'],null);
                }
                if(isset($_GET['facultyID'])){
                    $reserveServices->GetMyReservation(null,$_GET['facultyID']);
                }
                
                break;
        }
        
    }

?>
