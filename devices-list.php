<?php require 'app/app.php'; ?>
<!DOCTYPE html>
<html lang="en">

<?php require 'app/head.inc.php'; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require 'app/sidebar.inc.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require 'app/topbar.inc.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of devices</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                $cat="All Devices";
                                if($cat == "All Devices"){
                                    $sql = "SELECT * FROM devices";
                                }else{
                                    $sql = "SELECT * FROM devices WHERE category='$cat'";
                                }
                                //echo '<script>alert("'.$sql.'");</script>';
                                $res = mysqli_query($con, $sql);
                                ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th class="font-small">ID</th>
                                        <th class="font-small">Name</th>
                                        <th class="font-small">Category</th>
                                        <th class="font-small">Location</th>
                                        <th class="font-small">Mac Address</th>
                                        <th class="font-small">Duty Cycle</th>
                                        <th class="font-small">System ID</th>
                                        <th class="font-small">View Details</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th class="font-small">ID</th>
                                        <th class="font-small">Name</th>
                                        <th class="font-small">Category</th>
                                        <th class="font-small">Location</th>
                                        <th class="font-small">Mac Address</th>
                                        <th class="font-small">Duty Cycle</th>
                                        <th class="font-small">System ID</th>
                                        <th class="font-small">View Details</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    if(mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            echo '
                                    <tr>
                                        <td class="font-small">' . $row["ID"] . '</td>
                                        <td class="font-small">' . $row["device_name"] . '</td>
                                        <td class="font-small">' . $row["category"] . '</td>
                                        <td class="font-small">' . $row["state"] . '</td>
                                        <td class="font-small">' . $row["mac"] . '</td>
                                        <td class="font-small">' . $row["dutycycle"] . '</td>
                                        <td class="font-small">' . $row["system_id"] . '</td>
                                        <td class="font-small"><a href="device-details.php?id='.$row["ID"].'" id="a_style">View Details</a></td>
                                    </tr>
                                ';
                                        }
                                    }else {
                                        //echo 'No Data Found!';
                                        echo '<tr><td>No Data Found!</td></tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require 'app/footer.inc.php'; ?>

            <!-- Page level plugins -->
            <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="assets/js/demo/datatables-demo.js"></script>

</body>

</html>