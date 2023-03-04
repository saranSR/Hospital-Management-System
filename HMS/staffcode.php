<?php
session_start();
require 'staffcon.php';

if(isset($_POST['delete_staff']))
{
    $staff_id = mysqli_real_escape_string($con, $_POST['delete_staff']);

    $query = "DELETE FROM staff WHERE id='$staff_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Staff & Schedule Deleted Successfully";
        header("Location: staff.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Staff & Schedule Not Deleted";
        header("Location: staff.php");
        exit(0);
    }
}

if(isset($_POST['update_staff']))
{
    $staff_id = mysqli_real_escape_string($con, $_POST['staff_id']);
    $sid = mysqli_real_escape_string($con, $_POST['sid']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $room = mysqli_real_escape_string($con, $_POST['room']);
    $time = mysqli_real_escape_string($con, $_POST['time']);

    $query = "UPDATE staff SET sid='$sid', name='$name', room='$room', time='$time' WHERE id='$staff_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Staff & Schedule Updated Successfully";
        header("Location: staff.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Staff & Schedule Not Updated";
        header("Location: staff.php");
        exit(0);
    }

}


if(isset($_POST['save_data']))
{
    $sid = mysqli_real_escape_string($con, $_POST['sid']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $room = mysqli_real_escape_string($con, $_POST['room']);
    $time = mysqli_real_escape_string($con, $_POST['time']);

    $query = "INSERT INTO staff (sid,name,room,time) VALUES ('$sid','$name','$room','$time')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Staff & Schedule Details added successfully";
        header("Location: staff.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Staff & Schedule Details not added correctly";
        header("Location: staff.php");
        exit(0);
    }
}

?>