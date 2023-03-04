<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Patient Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Patient Edit 
                            <a href="patient.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $patient_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM patient WHERE id='$patient_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $patients = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="patient_id" value="<?= $patients['id']; ?>">

                                    <div class="mb-3">
                                        <label>Patient Name</label>
                                        <input type="text" name="name" value="<?=$patients['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Patient Age</label>
                                        <input type="age" name="age" value="<?=$patients['age'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Patient Contact</label>
                                        <input type="text" name="contact" value="<?=$patients['contact'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Patient Disease</label>
                                        <input type="text" name="disease" value="<?=$patients['disease'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_patient" class="btn btn-primary">
                                            Update Patient
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