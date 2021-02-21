<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/roomadmin_style.css">
    <link rel="stylesheet" href="../design/admin_faculty.css">
    <link rel="stylesheet" href="../design/account_edit.css">
    <script src="https://kit.fontawesome.com/73ad4c78b8.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <!-- sidebar -->
    <div class="navigation">
            <ul>
                <li>
                    <a href="roomAdmin.html">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="adminaccounts.html">
                        <span class="icon"><i class="fas fa-users-cog"></i></span>
                        <span class="title">Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-comment"></i></span>
                        <span class="title">Messages</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-boxes"></i></span>
                        <span class="title">Inventory</span>
                    </a>
                </li>   
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
    </div>
<!-- sidebar end -->
    <!-- toggle button -->
    <div class="toggle" onclick="toggleMenu()">
    </div>
    <!-- toggle end -->
<!-- top content -->
        <div class="top-content">
            <a href="../admin_faculty.php">Faculty</a>
            <a href="../admin_student.php">Student</a>
        </div>
<!-- topcontent end -->


<!-- main div of accounts -->
<div class="main-content">
        <?php
            $connection = mysqli_connect("localhost","root","","db_roomreservation");
            if(isset($_POST['edit_btn']))
            {
                $StudentID = $_POST['edit_ID'];   
                $query = "SELECT * FROM tbl_student WHERE StudentID='$StudentID' ";
                $query_run = mysqli_query($connection,$query);
                foreach($query_run as $row){
        ?>

<form action="edit_student_acc.php" method="POST">
            <div>
                <h5>Student ID:</h5>
                <input type="text" id="StudentID" name="edit_StudentID" value="<?php echo $row['StudentID'] ?>" placeholder="Enter Faculty ID: " readonly>
            </div>
            <div>
                <h5>Email Address:</h5>
                <input type="text" id="EmailAddress" name="edit_EmailAdd" value="<?php echo $row['EmailAddress'] ?>" placeholder="Enter Email: ">
            </div>
            <div>
                <h5>First Name:</h5>
                <input type="text"  id="FirstName"  name="edit_FirstName" value="<?php echo $row['FirstName'] ?>" placeholder="Enter first name: ">
            </div>
            <div>
                <h5>Middle Name:</h5>
                <input type="text" id="MiddleName"   name="edit_MiddleName" value="<?php echo $row['MiddleName'] ?>" placeholder="Enter middle name: ">
            </div>
            <div>
                <h5>Last Name:</h5>
                <input type="text"  id="LastName" name="edit_LastName" value="<?php echo $row['LastName'] ?>" placeholder="Enter lastname: ">
            </div>
            <div>
                <select class="select" id="CourseID" name="edit_Course"  value="<?php echo $row['CourseID'] ?>">
                <option disabled selected>COURSE</option>
                <option value="BSIT">BSIT</option>
                <option value="DICT">BSED</option>
                <option value="BSIT">BSIE</option>
                <option value="DICT">BSCE</option>
                </select>
                <br>
                <br>
            </div>       
            <div>
                <select class="select" id="YearID" name="edit_Year"  value="<?php echo $row['YearID'] ?>">
                <option disabled selected>Year</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>   
                </select>
                <br>
                <br>
            </div>
            <div>
                <h5>Birthday:</h5>
                <input type="date"  id="Birthday" name="edit_Birthday"  value="<?php echo $row['Birthday'] ?>">
            </div>
            <div>
                <h5>Password:</h5>
                <input type="password"  id="Password" name="edit_Password" value="<?php echo $row['Password'] ?>" placeholder="Enter Password: ">
            </div>
           
        <a href="../admin_student.php" class="btn">cancel</a>
        <button type="submit" name="update_btn" class="btn"> update </button>
</form>
        <?php
                }
            }
        ?>    
</div>
<!-- end of main div -->
    <script type="text/javascript">
        function toggleMenu(){
            let navigation = document.querySelector('.navigation')
            let toggle = document.querySelector('.toggle')
            navigation.classList.toggle('active');
            toggle.classList.toggle('active');
        }
    </script>
</body>
</html>