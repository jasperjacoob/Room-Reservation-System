<?php 
    class Room{
        public $roomID;
        public $date;
        public $timeIn;
        public $timeOut;
        public $subjectID;
        public $courseID;
        public $year;
        public $prof;
        
        function __construct($roomID,$date,$timeIn,$timeOut,$subjectID,$courseID,$year,$prof)
        {
        
            $this->year = $year;
            $this->prof = $prof;
            $this->date = $date;
            $this->roomID = $roomID;
            $this->timeIn = $timeIn;
            $this->timeOut = $timeOut;
            $this->subjectID = $subjectID;
            $this->courseID = $courseID;
        }
        function Get_ROOMID(){
            return $this->roomID;
        }
        function Get_DATE(){
            return $this->date;
        }
        function Get_TIMEIN(){
            return $this->timeIn;
        }
        function Get_TIMEOUT(){
            return $this->timeOut;
        }
        function Get_SUBJECTID(){
            return $this->subjectID;
        }
        function Get_COURSEID(){
            return $this->courseID;
        }
    }

?>