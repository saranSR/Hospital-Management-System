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
    <link rel="stylesheet" type="text/css" href="print.css" media="print">

    <title>Hospital Management System</title>
</head>
<body>
  
    <div class="container mt-4">

      

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                <div class="text-center">
        
                
                    <h4>Invoices</h4>
                    
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Patient</th>
                                    <th>Services Received</th>
                                    <th>Medicine</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM invoice";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $invoices)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $invoices['id']; ?></td>
                                                <td><?= $invoices['patient']; ?></td>
                                                <td><?= $invoices['service']; ?></td>
                                                <td><?= $invoices['medicine']; ?></td>
                                                <td><?= $invoices['amount']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                        <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
                        <a href="invoice.php" class="btn btn-danger" id="print-btn">BACK</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>