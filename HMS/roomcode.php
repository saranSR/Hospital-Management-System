<?php
session_start();
require 'roomcon.php';

if(isset($_POST['delete_room']))
{
    $room_id = mysqli_real_escape_string($con, $_POST['delete_room']);

    $query = "DELETE FROM room WHERE id='$room_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Room Deleted Successfully";
        header("Location: room.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Room Not Deleted";
        header("Location: room.php");
        exit(0);
    }
}

if(isset($_POST['update_room']))
{
    $room_id = mysqli_real_escape_string($con, $_POST['room_id']);
    $rid = mysqli_real_escape_string($con, $_POST['rid']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $availability = mysqli_real_escape_string($con, $_POST['availability']);

    $query = "UPDATE room SET rid='$rid', quantity='$quantity', availability='$availability' WHERE id='$room_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Room Updated Successfully";
        header("Location: room.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Room Not Updated";
        header("Location: room.php");
        exit(0);
    }

}


if(isset($_POST['save']))
{
    $rid = mysqli_real_escape_string($con, $_POST['rid']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $availability = mysqli_real_escape_string($con, $_POST['availability']);

    $query = "INSERT INTO room (rid,quantity,availability) VALUES ('$rid','$quantity','$availability')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Room Details added successfully";
        header("Location: room.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Room Details not added correctly";
        header("Location: room.php");
        exit(0);
    }
}

?>