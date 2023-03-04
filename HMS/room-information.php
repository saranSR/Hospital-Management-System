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
                        <h4>Add Room Details
                            <a href="room.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <form action="roomcode.php" method="post">
                                <div class="mb-3">
                                    <label>Room ID</label>
                                    <input type="text" name="rid" id="rid" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>No of Beds</label>
                                    <input type="text" name="quantity" id="quantity" class="form-control">
                                </div>

                                <div class="mb-3">
                                <label for="">Availability</label>
                                    <select name="availability" class="form-control">
                                        <option value="">--Select Availability--</option>
                                        <option value="Available">Available</option>
                                        <option value="Not Available">Not Available</option>
                                    </select>
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
