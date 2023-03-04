<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_patient']))
{
    $patient_id = mysqli_real_escape_string($con, $_POST['delete_patient']);

    $query = "DELETE FROM patient WHERE id='$patient_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Patient Deleted Successfully";
        header("Location: patient.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Patient Not Deleted";
        header("Location: patient.php");
        exit(0);
    }
}

if(isset($_POST['update_patient']))
{
    $patient_id = mysqli_real_escape_string($con, $_POST['patient_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $disease = mysqli_real_escape_string($con, $_POST['disease']);

    $query = "UPDATE patient SET name='$name', age='$age', contact='$contact', disease='$disease' WHERE id='$patient_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Patient Updated Successfully";
        header("Location: patient.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Patient Not Updated";
        header("Location: patient.php");
        exit(0);
    }

}


if(isset($_POST['submit']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $disease = mysqli_real_escape_string($con, $_POST['disease']);

    $query = "INSERT INTO patient (name,age,contact,disease) VALUES ('$name','$age','$contact','$disease')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Patient Created Successfully";
        header("Location: patient.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Patient Not Created";
        header("Location: patient.php");
        exit(0);
    }
}

?>