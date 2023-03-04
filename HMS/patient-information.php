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

    <title>Student Create</title>
</head>
<body>
  
    <div class="container mt-5">
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Patient Information
                            <a href="patient.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <form action="code.php" method="post">
                                <div class="mb-3">
                                    <label>Patient Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Patient Age</label>
                                    <input type="text" name="age" id="age" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Contact</label>
                                    <input type="text" name="contact" id="contact" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Disease</label>
                                    <input type="text" name="disease" id="disease" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
