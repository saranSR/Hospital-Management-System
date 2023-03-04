<?php
    session_start();
    require 'roomcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Hospital Management System</title>
</head>
<body>
  
    <div class="container mt-4">

    <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">HMS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="patient.php">Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="room.php">Room Availability</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="staff.php">Staff & Schedules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="invoice.php">Patient Invoice</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <?php include('message.php'); ?>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Room Details
                            <a href="room-information.php" class="btn btn-primary float-end">Add Room Information</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>RID</th>
                                    <th>Quality</th>
                                    <th>Availability</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM room";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $rooms)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $rooms['id']; ?></td>
                                                <td><?= $rooms['rid']; ?></td>
                                                <td><?= $rooms['quantity']; ?></td>
                                                <td><?= $rooms['availability']; ?></td>
                                                <td>
                                                    <a href="room-view.php?id=<?= $rooms['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="room-edit.php?id=<?= $rooms['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="roomcode.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_room" value="<?=$rooms['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
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

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>