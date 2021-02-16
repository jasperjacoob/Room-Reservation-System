<?php
    include 'Room.php';
    include 'Equipment.php';
    class ReservationServices{
        private $conn;
        function __construct(mysqli $conn)
        {
            $this->conn = $conn;
        }
        function GetAllEquipment(){
            $query = "SELECT equip.EquipmentID,equip.Description, cat.Description FROM tbl_equipment AS equip  INNER JOIN tbl_catergory As cat WHERE equip.CategoryID = cat.CategoryID";
            $res = $this->conn->query($query);
            $equip=[];
            $count = 0;
            if($res->num_rows > 0){
                while($row = $res->fetch_row()){
                    $equip[$row[0]] = new Equipment($row[1],$row[2]);
                    $count++;
                }
                echo json_encode($equip);
            }
        }
        
        function Reserve(Room $room,$equipment,$studentID){
            
            if($equipment!=null){
                if($studentID!=null){
                    $query = "INSERT INTO `tbl_reservation`( `EquipmentID`, `FacultyID`, `StudentID`,`Date`, `TimeIn`, `TimeOut`, `CourseID`, `YearID`, `StatusID`) VALUES (".$equipment.",'".$room->prof."','".$studentID."','".$room->date."','".$room->timeIn."','".$room->timeOut."','".$room->courseID."','".$room->year."',2)";
                    $this->conn->query($query);
                    if(empty($this->conn->error)){
                        echo "SUCCESSFUL";
                    }else{
                        echo $this->conn->error;
                    }
                }else{
                    $query = "INSERT INTO `tbl_reservation`( `EquipmentID`, `FacultyID`, `Date`, `TimeIn`, `TimeOut`, `CourseID`, `YearID`, `StatusID`) VALUES (".$equipment.",'".$room->prof."','".$room->date."','".$room->timeIn."','".$room->timeOut."','".$room->courseID."','".$room->year."',2)";
                    $this->conn->query($query);
                    if(empty($this->conn->error)){
                        echo "SUCCESSFUL";
                    }else{
                        echo $this->conn->error;
                    }
                }
                return;
            }
           if($this->CheckAvailability($room->timeIn,$room->date,$room->roomID)){
               if($studentID!=null){
                    $query = "INSERT INTO `tbl_reservation`( `RoomID`,`FacultyID`,`StudentID`,`Date`, `TimeIn`, `TimeOut`, `SubjectID`, `CourseID`,`YearID`,`StatusID`) VALUES ('".$room->roomID."','".$room->prof."','".$studentID."','".$room->date."','".$room->timeIn."','".$room->timeOut."','".$room->subjectID."','".$room->courseID."','".$room->year."',2)";
                    $this->conn->query($query);
                    if(empty($this->conn->error)){
                        echo "SUCCESSFUL";
                    }else{
                        echo $this->conn->error;
                    }
               }else{    
                    $query = "INSERT INTO `tbl_reservation`( `RoomID`,`FacultyID`,`Date`, `TimeIn`, `TimeOut`, `SubjectID`, `CourseID`,`YearID`,`StatusID`) VALUES ('".$room->roomID."','".$room->prof."','".$room->date."','".$room->timeIn."','".$room->timeOut."','".$room->subjectID."','".$room->courseID."','".$room->year."',2)";
                    $this->conn->query($query);
                    if(empty($this->conn->error)){
                        echo "SUCCESSFUL";
                    }else{
                        echo $this->conn->error;
                    }
               }
                
            }else{
                echo "TIME IS NOT AVAILABLE";
            }
        }
        function GetReserveViaDescription($description){
            $query = "SELECT `RoomID` FROM `tbl_room` WHERE `Description`= '" . $description . "'";
            $result = $this->conn->query($query);
            if(isset($result)){
                return $result->fetch_row();
            }
            
        }
        function GetMyReservation($studentID,$facultyID)
        {
            if($studentID!=null){
                $query = "SELECT tbl_reserve.RoomID, tbl_reserve.EquipmentID, tbl_reserve.Date, tbl_reserve.DateofApproval,stat.Description FROM tbl_reservation AS tbl_reserve INNER JOIN tbl_status AS stat WHERE tbl_reserve.StudentID = '".$studentID."' AND tbl_reserve.StatusID = stat.StatusID";
                $result = $this->conn->query($query);
                if($result->num_rows > 0){
                    
                    while($row = $result->fetch_row()){
                        if($row[0]!=null){
                                $room = $this->GetRoomDescription($row[0]);
                                echo "<tr>
                                <td>".$room."</td>    
                                <td>".$row[2]."</td>
                                <td>".$row[3]."</td>
                                <td>".$row[4]."</td>
                                </tr>";
                        }else{
                                
                            $equip = $this->GetEquipmentDescription($row[1]);
                            echo "<tr>
                            <td>".$equip."</td>
                                <td>".$row[2]."</td>
                                <td>".$row[3]."</td>
                                <td>".$row[4]."</td>
                                </tr>";
                        }
                    }
                }
            }else{
                $query = "SELECT tbl_reserve.RoomID, tbl_reserve.EquipmentID, tbl_reserve.Date, tbl_reserve.DateofApproval,stat.Description FROM tbl_reservation AS tbl_reserve INNER JOIN tbl_status AS stat WHERE tbl_reserve.StatusID = stat.StatusID AND `FacultyID` = '".$facultyID."'";
                $result = $this->conn->query($query);
                if($result->num_rows > 0){
                    while($row = $result->fetch_row()){
                        if($row[0]!=null){
                                $room = $this->GetRoomDescription($row[0]);
                                echo "<tr>
                                <td>".$room."</td>
                                <td>".$row[2]."</td>
                                <td>".$row[3]."</td>
                                <td>".$row[4]."</td>
                                </tr>";
                        }else{
                                $equip = $this->GetEquipmentDescription($row[1]);
                                echo "<tr>
                                <td>".$equip."</td>
                                <td>".$row[2]."</td>
                                <td>".$row[3]."</td>
                                <td>".$row[4]."</td>
                                </tr>";
                        }
                    }
                }
            }

        }
        function GetRoomDescription($roomID){
            $query = "SELECT `Description` FROM `tbl_room` WHERE `RoomID` ='".$roomID."'";
            $res = $this->conn->query($query);
            if($res->num_rows !=0){
                 $row = $res->fetch_row();
                 return $row[0];
            }
        }
        function GetEquipmentDescription($equipmentID)
        {
            $query ="SELECT `Description` FROM `tbl_equipment` WHERE `EquipmentID` ='".$equipmentID."'";
            $res = $this->conn->query($query);
            if($res->num_rows !=0){
                $row = $res->fetch_row();
                return $row[0];
            }
        }
        function ConvertID($ID,$tablename){
            if($tablename=="faculty"){
                $query = "SELECT `FirstName`,`LastName` FROM `tbl_".$tablename."` WHERE `".ucfirst($tablename)."ID` = '" . $ID . "'";
                $result = $this->conn->query($query);
                if(isset($result)){
                    return $result->fetch_row();
                }
            }
            $query = "SELECT `Description` FROM `tbl_".$tablename."` WHERE `".ucfirst($tablename)."ID` = '" . $ID . "'";
            $result = $this->conn->query($query);
            if(isset($result)){
                return $result->fetch_row();
            }
            
        }
        
        function GetReservationOfCurrentRoom($roomID){
            date_default_timezone_set('Asia/Manila');
            $rooms = [];
            $query = "SELECT * FROM `tbl_reservation` WHERE `Date` = '".date("Y-m-d")."' AND `TimeIn` <= '" . date("H:i:s a") ."' AND `TimeOut` >= '" . date("H:i:s a") . "' AND `RoomID` = '" .$roomID. "'";
            $result = $this->conn->query($query);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $profname = $this->ConvertID($row['FacultyID'],"faculty");
                    $course = $this->ConvertID($row['CourseID'],"course");
                    $subject = $this->ConvertID($row['SubjectID'],"subject");
                    $year = $this->ConvertID($row['YearID'],"year");
                    $rooms[$row['ReservationID']] = new Room( $row['RoomID'], $row['Date'],date("h:i:s a", strtotime($row['TimeIn'])),date("h:i:s a", strtotime($row['TimeOut'])),$subject[0],$course[0],$year[0],$profname[0]." ".$profname[1]);
                    
                }
                echo json_encode($rooms);
            }else{
                echo "VACANT";
            }
            
        }
        function GetReservationOfCurrentMonth($month,$year){
            $rooms = [];
            $query = "SELECT tbl_reservation.ReservationID, tbl_room.Description,tbl_reservation.FacultyID, tbl_reservation.Date, tbl_reservation.TimeIn, tbl_reservation.TimeOut, tbl_reservation.SubjectID, tbl_reservation.CourseID, tbl_reservation.YearID FROM `tbl_reservation` INNER JOIN `tbl_room` WHERE tbl_room.RoomID = tbl_reservation.RoomID AND MONTH(Date) = '".$month."' AND YEAR(Date) = '".$year."'";
            $result = $this->conn->query($query);
            while($row = $result->fetch_assoc()){
                $rooms[$row['ReservationID']] = new Room($row['Description'],$row['Date'],date("h:i:s a", strtotime($row['TimeIn'])),date("h:i:s a", strtotime($row['TimeOut'])),$row['SubjectID'],$row['CourseID'],$row['YearID'],$row['FacultyID']); 
            }
            echo json_encode($rooms);
        
        }
        function CheckAvailability($timeIn,$date,$roomID){
            $query = "SELECT * FROM `tbl_reservation` WHERE `Date` = '".$date."' AND `RoomID` = '".$roomID."' AND `TimeIn` <= '".$timeIn."' AND `TimeOut` >= '".$timeIn."' AND `StatusID` =" . 1;
            $res = $this->conn->query($query);
            $row = $res->fetch_row();
            if(empty($row)){
                return true;
            }else{
                return false;
            }
        }
        function PopulateRoom(){
            $query = "SELECT * FROM `tbl_room`";
            $res = $this->conn->query($query);
            $course = [];
            while($row = $res->fetch_assoc()){
                $course[$row['RoomID']] = $row['Description'];
            }
            echo json_encode($course);
        }
    }


?>