<?php
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

    <title>Patient View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View Staff & Schedule Details 
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
                                $invoice = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Patient</label>
                                        <p class="form-control">
                                            <?=$invoice['patient'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Service</label>
                                        <p class="form-control">
                                            <?=$invoice['service'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Medicine</label>
                                        <p class="form-control">
                                            <?=$invoice['medicine'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Amount</label>
                                        <p class="form-control">
                                            <?=$invoice['amount'];?>
                                        </p>
                                    </div>
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