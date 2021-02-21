<?php
session_start();
$connection = mysqli_connect("localhost","root","","db_roomreservation");

if(isset($_POST['update_btn']))
{
    $FacultyID = $_POST['edit_FacultyID']; 
    $EmailAddress = $_POST['edit_EmailAdd'];
    $FirstName = $_POST['edit_FirstName'];
    $MiddleName = $_POST['edit_MiddleName'];
    $LastName = $_POST['edit_LastName'];
    $Birthday = $_POST['edit_Birthday'];
    $Password = $_POST['edit_Password'];
    
    $query = "UPDATE tbl_faculty SET  FacultyID='$FacultyID', EmailAddress='$EmailAddress', FirstName='$FirstName', MiddleName='$MiddleName', 
    LastName='$LastName', Birthday='$Birthday', Password='$Password'   WHERE FacultyID='$FacultyID' ";
    $query_run = mysqli_query($connection,$query);

    if($query_run){
        echo "<br>Your Data is Updated";
        header('location: ../admin_faculty.php');
    }
    else{
        echo  "<br>Your Data is not Updated";
        // header('location: admin.php');
    }

}

if(isset($_POST['delete_btn'])){
    $stud_ID = $_POST['del_ID'];
    $query = "DELETE FROM tbl_faculty WHERE FacultyID='$FacultyID' ";
    $query_run = mysqli_query($connection,$query);

    if($query_run){
        echo "<br>Your Data is deleted";
        header('location: ../admin_faculty.php');
    }
    else{
        echo  "<br>Your Data is not deleted";
        // header('location: admin.php');
    }
}
?>