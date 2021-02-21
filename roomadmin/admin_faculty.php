<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design/roomadmin_style.css">
    <link rel="stylesheet" href="design/admin_faculty.css">
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
            <a href="admin_faculty.php">Faculty</a>
            <a href="admin_student.php">Student</a>
        </div>
<!-- topcontent end -->


<!-- main div of accounts -->
<div class="main-content">
        <?php
            $connection = mysqli_connect("localhost","root","","db_roomreservation");
            $query = "SELECT * FROM tbl_faculty";
            $query_run = mysqli_query($connection, $query);
            ?>

    <table>
                <thead>
                    <tr>
                        <td>Faculty ID</td>
                        <td>Email Address</td>
                        <td>First Name</td>
                        <td>Middle Name</td>
                        <td>Last Name</td>
                        <td>Birthday</td>
                        <td>Password</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                </thead>
        <tbody>

        <?php
        if(mysqli_num_rows($query_run) > 0){
            while ($row = mysqli_fetch_assoc($query_run)){
            ?>   
            <tr>
            <td><?php echo $row['FacultyID']; ?></td>      
            <td><?php echo $row['EmailAddress']; ?></td>
            <td><?php echo $row['FirstName']; ?></td>
            <td><?php echo $row['MiddleName']; ?></td>
            <td><?php echo $row['LastName']; ?></td>
            <td><?php echo $row['Birthday']; ?></td>
            <td><?php echo $row['Password']; ?></td>
            <td>  
            <form action="php/faculty_edit.php" method="POST">
                <input type="hidden" name="edit_ID" value="<?php echo $row['FacultyID']; ?>">
                <button type="submit" name="edit_btn" class="btnEdit">  EDIT   </button> 
            </form>  
            </td>
            <td> 
                <form action="code.php" method="POST">
                    <input type="hidden" name="del_ID" value="<?php echo $row['FacultyID']; ?>">
                    <button type="submit" name="delete_btn" class="btnDelete">  DELETE </button> 
                </form>
            </td>
            </tr>
        <?php
            }
        }
        else {
            echo "no record found";
        }
        ?>
        </tbody>
    </table>

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