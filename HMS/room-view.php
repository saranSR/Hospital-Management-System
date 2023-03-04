<?php
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

    <title>Patient View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View Room Details 
                            <a href="room.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $room_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM room WHERE id='$room_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $room = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Room ID</label>
                                        <p class="form-control">
                                            <?=$room['rid'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>No of Beds</label>
                                        <p class="form-control">
                                            <?=$room['quantity'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Availability</label>
                                        <p class="form-control">
                                            <?=$room['availability'];?>
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