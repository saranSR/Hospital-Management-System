<?php
session_start();
require 'invoicecon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Room Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Staff Edit 
                            <a href="invoice.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $invoice_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM invoice WHERE id='$invoice_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $invoices = mysqli_fetch_array($query_run);
                                ?>
                                <form action="invoicecode.php" method="POST">
                                    <input type="hidden" name="invoice_id" value="<?= $invoices['id']; ?>">

                                    <div class="mb-3">
                                        <label>Patient</label>
                                        <input type="text" name="patient" id="patient" value="<?=$invoices['patient'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Services Provided</label>
                                        <input type="text" name="service" id="service" value="<?=$invoices['service'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Medicine</label>
                                        <input type="text" name="medicine" id="medicine" value="<?=$invoices['medicine'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Amount</label>
                                        <input type="text" name="amount" id="amount" value="<?=$invoices['amount'];?>" class="form-control">
                                    </div>
                                
                                    <div class="mb-3">
                                        <button type="submit" name="update_invoice" class="btn btn-primary">
                                            Update 
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>