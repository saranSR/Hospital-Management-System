<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Staff & Schedules</title>
</head>
<body>
  
    <div class="container mt-5">
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Staff & Schedule Details
                            <a href="invoice.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <form action="invoicecode.php" method="post">
                                <div class="mb-3">
                                    <label>Patient</label>
                                    <input type="text" name="patient" id="patient" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Services Provided</label>
                                    <input type="text" name="service" id="service" class="form-control">
                                </div>
                                
                                <div class="mb-3">
                                    <label>Medicine</label>
                                    <input type="text" name="medicine" id="medicine" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control">
                                </div>
                                
                                <div class="mb-3">
                                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
