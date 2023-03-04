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

    <title>Room Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Room Edit 
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
                                $rooms = mysqli_fetch_array($query_run);
                                ?>
                                <form action="roomcode.php" method="POST">
                                    <input type="hidden" name="room_id" value="<?= $rooms['id']; ?>">

                                    <div class="mb-3">
                                        <label>RID</label>
                                        <input type="text" name="rid" value="<?=$rooms['rid'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>No of Beds</label>
                                        <input type="text" name="quantity" value="<?=$rooms['quantity'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Availability</label>
                                        <select name="availability" value="<?=$rooms['availability'];?>" class="form-control">
                                            <option value="">--Select Availability--</option>
                                            <option value="Available">Available</option>
                                            <option value="Not Available">Not Available</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_room" class="btn btn-primary">
                                            Update Room
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