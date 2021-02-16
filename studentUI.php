<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="design/studentUI_style.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script/timeChecker.js"></script>
    <script src="script/request.js"></script>
    <script src="script/student.js"></script>
    
</head>
<body>
    <header class="main-header"> 
        <img class="imglogo" src=image/PUPLogo.png>
        <div class="header"> 
            <h2> POLYTECHNIC UNIVERSITY OF THE PHILIPPINES </h2>     
            <p class="text1"> BIÑAN CAMPUS </p>
        </div>
    </header>

<img class="pup" src="image/pup.jpg">


 <!-- for table -->
<div class="container">
    <div class="tbl-container">
        <table id="tbl_room">
        <tr>
        <th colspan="5" class="thead" > 
        <?php 
        echo "<p id='date'>" . date("l")."," ." ". date("Y/m/d") ."</p>";               
        ?>    
        </th>
        </tr>
        <tr id="tab_header">
            <th>Reservations</th>
            <th>Reservation Date</th>
            <th>Date of approval</th>
            <th>Status</th>
        </tr>
       
        </table>
    </div>

    <div class="res-container">

        <div class="side-container">
            <div class="sd_div">
                <img>
                <button class="btnSide" id="resEquipment">Reserve Equipment</button>
            </div>
            <div class="sd_div">
                <img src="image/reserve.svg" class="img-side">
                  <button class="btnSide" id="resModalBtn"> reserve room</button>
            </div>
            <div class="sd_div">
                <img src="image/logout.svg" class="img-side">
             <a href="index.php"> <button class="btnSide"> logout</button> </a>
            </div>
            <div class="sd_div">
                <img src="image/about.svg" class="img-side">
                <button class="btnSide" id="aboutBtn"> about</button>
             </div>
        </div>
        
        
    </div>
</div>




   <div id="simpleModal3" class="modal">
    <div class="modal-content">
        <div class="modal-header">
        <span class="closeBtn1">&times;</span>
        <h2>EQUIPMENT RESERVATION</h2>
       </div>
       <div class="modal-body">
            <form id="res_equip">  
                   <div>
                       <h5>Equipment:</h5>
                        <select name="Equipment">

                        </select>
                   </div>
                   <div>
                       <h5>PROFESSOR NAME:</h5>
                       <select name="Professor">

                        </select>
                   </div>
                   <div>
                        <h5>DATE:</h5>
                        <input id="date_equip" name ="Date" type="date">
                       <h5>TIME IN:</h5>
                       <input id="timein_equip" name ="Timein" type="time">
                       <h5>TIME OUT:</h5>
                       <input id="timeout_equip" name ="Timeout" type="time">
                   </div>
                   
                   <div>
                       <h5>COURSE:</h5>
                       <select name="Course">

                        </select>
                   </div>
                   <div>
                       <h5>YEAR:</h5>
                       <select name="Year">

                        </select>
                   </div>
                   <label id="res_errormsg"></label>
                   <button type="submit" class="btnFooter" id="reserveEquipment">reserve</button>
                   <input type="reset" value="RESET" class="btnFooter">
            </form>
       </div>
       <div class="modal-footer">
            
            
       </div>
    </div>
   </div>
<!-- FOR ROOM RESERVATION -->
<div id="simpleModal1" class="modal">
    <div class="modal-content">
        <div class="modal-header">
        <span class="closeBtn1">&times;</span>
        <h2>ROOM RESERVATION</h2>
       </div>
       <div class="modal-body">
            <form id="res_room">  
                   <div>
                       <h5>ROOM:</h5>
                        <select name="RoomNum">

                        </select>
                   </div>
                   <div>
                       <h5>PROFESSOR NAME:</h5>
                       <select name="Professor">

                        </select>
                   </div>
                   <div>
                       <h5>DATE:</h5>
                       <input id="date_room" name="Date" type="date">
                       <h5>TIME IN:</h5>
                       <input id="timein" name ="Timein" type="time">
                       <h5>TIME OUT:</h5>
                       <input id="timeout" name ="Timeout" type="time">

                   </div>
                   
                   <div>
                       <h5>COURSE:</h5>
                       <select name="Course">

                        </select>
                   </div>
                   <div>
                       <h5>YEAR:</h5>
                       <select name="Year">

                        </select>
                   </div>
                   <div>
                       <h5>SUBJECT CODE:</h5>
                       <select name="SubjectCode">

                        </select>
                   </div>
                   <label id="res_errormsg"></label>
                   <button type="submit" class="btnFooter">reserve</button>
                   <input type="reset" value="RESET" class="btnFooter">
            </form>
       </div>
       <div class="modal-footer">
            
            
       </div>
    </div>
   </div>
<!-- FOR ROOM RESERVATION -->
<div id="simpleModal3" class="modal">
    <div class="modal-content">
        <div class="modal-header">
        <span class="closeBtn1">&times;</span>
        <h2>EQUIPMENT RESERVATION</h2>
       </div>
       <div class="modal-body">
            <form id="res_equip">  
                   <div>
                       <h5>EQUIPMENT:</h5>
                        <select name="Equipment">

                        </select>
                   </div>
                   <div>
                       <h5>PROFESSOR NAME:</h5>
                       <select name="Professor">

                        </select>
                   </div>
                   <div>
                       <h5>DATE:</h5>
                       <input id="date_room" name="Date" type="date">
                       <h5>TIME IN:</h5>
                       <input id="timein" name ="Timein" type="time">
                       <h5>TIME OUT:</h5>
                       <input id="timeout" name ="Timeout" type="time">

                   </div>
                   
                   <div>
                       <h5>COURSE:</h5>
                       <select name="Course">

                        </select>
                   </div>
                   <div>
                       <h5>YEAR:</h5>
                       <select name="Year">

                        </select>
                   </div>
                   <label id="res_errormsg"></label>
                   <button type="submit" class="btnFooter">reserve</button>
                   <input type="reset" value="RESET" class="btnFooter">
            </form>
       </div>
       <div class="modal-footer">
            
            
       </div>
    </div>
   </div>


   <!-- MODAL FOR ABOUT -->
<div id="simpleModal2" class="modal">
    <div class="modal-content">
        <div class="modal-header">
        <span class="closeBtn2">&times;</span>
        <h2>ABOUT</h2>
       </div>
       <div class="modal-body">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias autem, magnam esse accusamus
             facere consequuntur amet reiciendis voluptas
            libero ab aliquid nulla obcaecati ea facilis voluptates nemo consequatur! Repudiandae, minima?
       </div>
       <div class="modal-footer">
           
       </div>
    </div>
</div>

  
</body>
</html>