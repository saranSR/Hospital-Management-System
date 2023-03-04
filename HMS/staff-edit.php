<?php
session_start();
require 'staffcon.php';
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
                            <a href="staff.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $staff_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM staff WHERE id='$staff_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $staffs = mysqli_fetch_array($query_run);
                                ?>
                                <form action="staffcode.php" method="POST">
                                    <input type="hidden" name="staff_id" value="<?= $staffs['id']; ?>">

                                    <div class="mb-3">
                                        <label>Staff ID</label>
                                        <input type="text" name="sid" id="sid" value="<?=$staffs['sid'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Staff Name</label>
                                        <input type="text" name="name" id="name" value="<?=$staffs['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Operating Room</label>
                                        <input type="text" name="room" id="room" value="<?=$staffs['room'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Time</label>
                                        <select name="time" value="<?=$staffs['time'];?>" class="form-control">
                                            <option value="">--Select Time--</option>
                                            <option value="8.00 AM to 2.00 PM">8.00 AM to 12.00 PM</option>
                                            <option value="12.00 PM to 4.00 PM">12.00 PM to 4.00 PM</option>
                                            <option value="4.00 PM to 8.00 PM">4.00 PM to 8.00 PM</option>
                                        </select>
                                    </div>
                                
                                    <div class="mb-3">
                                        <button type="submit" name="update_staff" class="btn btn-primary">
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