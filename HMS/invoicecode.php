<?php
session_start();
require 'invoicecon.php';

if(isset($_POST['delete_invoice']))
{
    $invoice_id = mysqli_real_escape_string($con, $_POST['delete_invoice']);

    $query = "DELETE FROM invoice WHERE id='$invoice_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Invoice Deleted Successfully";
        header("Location: invoice.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Invoice Not Deleted";
        header("Location: invoice.php");
        exit(0);
    }
}

if(isset($_POST['update_invoice']))
{
    $invoice_id = mysqli_real_escape_string($con, $_POST['invoice_id']);
    $patient = mysqli_real_escape_string($con, $_POST['patient']);
    $service = mysqli_real_escape_string($con, $_POST['service']);
    $medicine = mysqli_real_escape_string($con, $_POST['medicine']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);

    $query = "UPDATE invoice SET patient='$patient', service='$service', medicine='$medicine', amount='$amount' WHERE id='$invoice_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Invoice Updated Successfully";
        header("Location: invoice.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Invoice Not Updated";
        header("Location: invoice.php");
        exit(0);
    }

}


if(isset($_POST['save']))
{
    $patient = mysqli_real_escape_string($con, $_POST['patient']);
    $service = mysqli_real_escape_string($con, $_POST['service']);
    $invoice = mysqli_real_escape_string($con, $_POST['medicine']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);

    $query = "INSERT INTO invoice (patient,service,medicine,amount) VALUES ('$patient','$service','$invoice','$amount')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Invoice Details added successfully";
        header("Location: invoice.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Invoice Details not added correctly";
        header("Location: invoice.php");
        exit(0);
    }
}

?>