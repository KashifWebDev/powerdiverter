<?php require 'app/app.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php
 $sql = "SELECT * FROM devices";
 $res = mysqli_query($con, $sql);
 $total_devices = mysqli_num_rows($res);
?>
<?php require 'app/head.inc.php'; ?>


<script src="assets/js/admin_submit_values.js"></script>
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
<?php $id=''; ?>
                <!-- Topbar -->
                <?php require 'app/topbar.inc.php'; ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <div class="row justify-content-center">
                        <div class="col-md-8 mt-3">
                            <img src="assets/images/map.png" usemap="#image-map">

                            <map name="image-map">
                                <area alt="Western Australia" title="Western Australia" data-toggle="modal" data-target="#wa"
                                      coords="344,413,127,486,90,458,99,428,87,355,65,262,84,219,169,178,217,145,258,96,299,71,347,86" shape="poly">

                                <area alt="Northern Territory" title="Northern Territory" data-toggle="modal" data-target="#nt"
                                      coords="350,88,347,296,509,295,509,117,461,88,487,37,405,8,359,47" shape="poly">

                                <area alt="QueensLand" title="QueensLand" data-toggle="modal" data-target="#sa"
                                      coords="511,119,511,297,564,301,564,357,789,341,779,282,731,220,695,183,654,135,640,92,609,51,587,10,569,122,548,135" shape="poly">

                                <area alt="South Australia" title="South Australia" data-toggle="modal" data-target="#ql"
                                      coords="346,414,418,423,451,450,467,485,507,438,501,480,511,497,563,558,559,303,348,302" shape="poly">

                                <area target="" alt="New South Wales" title="New South Wales" data-toggle="modal" data-target="#nsw"
                                      coords="563,364,564,464,586,473,604,490,625,509,651,509,690,509,723,540,739,481,777,402,786,347" shape="poly">

                                <area target="" alt="Victoria" title="Victoria" data-toggle="modal" data-target="#vt"
                                      coords="563,471,566,556,587,560,612,565,635,553,659,574,688,556,723,543,691,524,621,513,593,490" shape="poly">

                                <area target="" alt="Tasmania" title="Tasmania" data-toggle="modal" data-target="#tm"
                                      coords="629,620,644,654,644,671,660,688,681,677,685,671,690,655,691,623" shape="poly">
                            </map>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                <!-- State Modals -->
                <?php $state = 'Western Australia'; ?>
                <div class="modal" id="wa">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo $state; ?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="card-body">
                                <div class="card-body">
                                    <!--Communication Method-->
                                    <div class="row" id="communication_block_wa">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", 'WiFi', 'communication_block_wa'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-danger text-white">
                                                    <div class="card-body p-2">
                                                        WiFi
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", '3G', 'communication_block_wa'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-secondary text-white">
                                                    <div class="card-body p-2">
                                                        3G
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", '4G', 'communication_block_wa'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-success text-white">
                                                    <div class="card-body p-2">
                                                        4G
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", 'LORA', 'communication_block_wa'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-body p-2">
                                                        LORA
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!--Relay Operation-->
                                    <div class="row" id="relay_block_wa">
                                        <div class="card-body" id="relay_operation_block">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="#" onclick="relay_operation(<?php echo '\''.$state.'\''.', \'OFF\'', ', \'relay_block_wa\''; ?>)" class="text-white text-decoration-none">
                                                        <div class="card bg-success text-white">
                                                            <div class="card-body p-2">
                                                                Off Peak
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="#" onclick="relay_operation(<?php echo '\''.$state.'\''.', \'ON\'', ', \'relay_block_wa\''; ?>)" class="text-white text-decoration-none">
                                                        <div class="card bg-info text-white">
                                                            <div class="card-body p-2">
                                                                Main
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Set Pole/Post Time -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sel1">Pole Time:</label>
                                                            <select class="form-control" id="pole_time" name="pole_time" required>
                                                                <option value="30000">30sec</option>
                                                                <option value="60000">1min</option>
                                                                <option value="90000">1.5min</option>
                                                                <option value="180000">3min</option>
                                                                <option value="300000">5min</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sel1">Post Time:</label>
                                                            <select class="form-control" id="post_time" name="post_time" required>
                                                                <option value="30000">30sec</option>
                                                                <option value="60000">1min</option>
                                                                <option value="90000">1.5min</option>
                                                                <option value="180000">3min</option>
                                                                <option value="300000">5min</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <input type="button" name="pole_post_time" onclick="set_poll_post_time('<?php echo $state; ?>')"
                                                           class="btn btn-primary w-100" id="update_poll_post" value="Set Pole/Post Time">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Set DutyCycle -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label for="formControlRange">
                                                        Duty Cycle: <span id="dutyCycleValue">-</span>%
                                                    </label>
                                                    <input onchange="showVal(this.value)" type="range"
                                                           class="form-control-range" id="formControlRange"
                                                           name="range_val">
                                                </div>
                                                <div class="form-group">
                                                    <input type="button" class="btn btn-primary w-100"
                                                           name="dc_update" id="update_dc_btn"
                                                           onclick="update_dutycycle('<?php echo $state; ?>', document.getElementsByName('range_val')[0].value)"
                                                           value="Set DutyCycle">
                                                </div>

                                                <script>
                                                    function showVal(newVal){
                                                        document.getElementById("dutyCycleValue").innerHTML=newVal;
                                                    }
                                                    // document.getElementById("dutyCycleValue").innerHTML='50';
                                                </script>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $state = 'Northern Territory'; ?>
                <div class="modal" id="nt">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo $state; ?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="card-body">
                                <div class="card-body">
                                    <!--Communication Method-->
                                    <div class="row" id="communication_block_nt">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", 'WiFi', 'communication_block_nt'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-danger text-white">
                                                    <div class="card-body p-2">
                                                        WiFi
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", '3G', 'communication_block_nt'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-secondary text-white">
                                                    <div class="card-body p-2">
                                                        3G
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", '4G', 'communication_block_nt'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-success text-white">
                                                    <div class="card-body p-2">
                                                        4G
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", 'LORA', 'communication_block_nt'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-body p-2">
                                                        LORA
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!--Relay Operation-->
                                    <div class="row" id="relay_block_nt">
                                        <div class="card-body" id="relay_operation_block">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="#" onclick="relay_operation(<?php echo '\''.$state.'\''.', \'OFF\'', ', \'relay_block_nt\''; ?>)" class="text-white text-decoration-none">
                                                        <div class="card bg-success text-white">
                                                            <div class="card-body p-2">
                                                                Off Peak
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="#" onclick="relay_operation(<?php echo '\''.$state.'\''.', \'ON\'', ', \'relay_block_nt\''; ?>)" class="text-white text-decoration-none">
                                                        <div class="card bg-info text-white">
                                                            <div class="card-body p-2">
                                                                Main
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Set Pole/Post Time -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sel1">Pole Time:</label>
                                                            <select class="form-control" id="pole_time" name="pole_time" required>
                                                                <option value="30000">30sec</option>
                                                                <option value="60000">1min</option>
                                                                <option value="90000">1.5min</option>
                                                                <option value="180000">3min</option>
                                                                <option value="300000">5min</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sel1">Post Time:</label>
                                                            <select class="form-control" id="post_time" name="post_time" required>
                                                                <option value="30000">30sec</option>
                                                                <option value="60000">1min</option>
                                                                <option value="90000">1.5min</option>
                                                                <option value="180000">3min</option>
                                                                <option value="300000">5min</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <input type="button" name="pole_post_time" onclick="set_poll_post_time('<?php echo $state; ?>')"
                                                           class="btn btn-primary w-100" id="update_poll_post" value="Set Pole/Post Time">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Set DutyCycle -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label for="formControlRange">
                                                        Duty Cycle: <span id="dutyCycleValue">-</span>%
                                                    </label>
                                                    <input onchange="showVal(this.value)" type="range"
                                                           class="form-control-range" id="formControlRange"
                                                           name="range_val">
                                                </div>
                                                <div class="form-group">
                                                    <input type="button" class="btn btn-primary w-100"
                                                           name="dc_update" id="update_dc_btn"
                                                           onclick="update_dutycycle('<?php echo $state; ?>', document.getElementsByName('range_val')[0].value)"
                                                           value="Set DutyCycle">
                                                </div>

                                                <script>
                                                    function showVal(newVal){
                                                        document.getElementById("dutyCycleValue").innerHTML=newVal;
                                                    }
                                                    // document.getElementById("dutyCycleValue").innerHTML='50';
                                                </script>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $state = 'South Australia'; ?>
                <div class="modal" id="sa">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo $state; ?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="card-body">
                                <div class="card-body">
                                    <!--Communication Method-->
                                    <div class="row" id="communication_block_sa">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", 'WiFi', 'communication_block_sa'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-danger text-white">
                                                    <div class="card-body p-2">
                                                        WiFi
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", '3G', 'communication_block_sa'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-secondary text-white">
                                                    <div class="card-body p-2">
                                                        3G
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", '4G', 'communication_block_sa'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-success text-white">
                                                    <div class="card-body p-2">
                                                        4G
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", 'LORA', 'communication_block_sa'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-body p-2">
                                                        LORA
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!--Relay Operation-->
                                    <div class="row" id="relay_block_sa">
                                        <div class="card-body" id="relay_operation_block">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="#" onclick="relay_operation(<?php echo '\''.$state.'\''.', \'OFF\'', ', \'relay_block_sa\''; ?>)" class="text-white text-decoration-none">
                                                        <div class="card bg-success text-white">
                                                            <div class="card-body p-2">
                                                                Off Peak
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="#" onclick="relay_operation(<?php echo '\''.$state.'\''.', \'ON\'', ', \'relay_block_sa\''; ?>)" class="text-white text-decoration-none">
                                                        <div class="card bg-info text-white">
                                                            <div class="card-body p-2">
                                                                Main
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Set Pole/Post Time -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sel1">Pole Time:</label>
                                                            <select class="form-control" id="pole_time" name="pole_time" required>
                                                                <option value="30000">30sec</option>
                                                                <option value="60000">1min</option>
                                                                <option value="90000">1.5min</option>
                                                                <option value="180000">3min</option>
                                                                <option value="300000">5min</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sel1">Post Time:</label>
                                                            <select class="form-control" id="post_time" name="post_time" required>
                                                                <option value="30000">30sec</option>
                                                                <option value="60000">1min</option>
                                                                <option value="90000">1.5min</option>
                                                                <option value="180000">3min</option>
                                                                <option value="300000">5min</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <input type="button" name="pole_post_time" onclick="set_poll_post_time('<?php echo $state; ?>')"
                                                           class="btn btn-primary w-100" id="update_poll_post" value="Set Pole/Post Time">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Set DutyCycle -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label for="formControlRange">
                                                        Duty Cycle: <span id="dutyCycleValue">-</span>%
                                                    </label>
                                                    <input onchange="showVal(this.value)" type="range"
                                                           class="form-control-range" id="formControlRange"
                                                           name="range_val">
                                                </div>
                                                <div class="form-group">
                                                    <input type="button" class="btn btn-primary w-100"
                                                           name="dc_update" id="update_dc_btn"
                                                           onclick="update_dutycycle('<?php echo $state; ?>', document.getElementsByName('range_val')[0].value)"
                                                           value="Set DutyCycle">
                                                </div>

                                                <script>
                                                    function showVal(newVal){
                                                        document.getElementById("dutyCycleValue").innerHTML=newVal;
                                                    }
                                                    // document.getElementById("dutyCycleValue").innerHTML='50';
                                                </script>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $state = 'Queensland'; ?>
                <div class="modal" id="ql">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo $state; ?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="card-body">
                                <div class="card-body">
                                    <!--Communication Method-->
                                    <div class="row" id="communication_block_ql">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", 'WiFi', 'communication_block_ql'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-danger text-white">
                                                    <div class="card-body p-2">
                                                        WiFi
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", '3G', 'communication_block_ql'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-secondary text-white">
                                                    <div class="card-body p-2">
                                                        3G
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", '4G', 'communication_block_ql'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-success text-white">
                                                    <div class="card-body p-2">
                                                        4G
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", 'LORA', 'communication_block_ql'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-body p-2">
                                                        LORA
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!--Relay Operation-->
                                    <div class="row" id="relay_block_ql">
                                        <div class="card-body" id="relay_operation_block">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="#" onclick="relay_operation(<?php echo '\''.$state.'\''.', \'OFF\'', ', \'relay_block_ql\''; ?>)" class="text-white text-decoration-none">
                                                        <div class="card bg-success text-white">
                                                            <div class="card-body p-2">
                                                                Off Peak
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="#" onclick="relay_operation(<?php echo '\''.$state.'\''.', \'ON\'', ', \'relay_block_ql\''; ?>)" class="text-white text-decoration-none">
                                                        <div class="card bg-info text-white">
                                                            <div class="card-body p-2">
                                                                Main
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Set Pole/Post Time -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sel1">Pole Time:</label>
                                                            <select class="form-control" id="pole_time" name="pole_time" required>
                                                                <option value="30000">30sec</option>
                                                                <option value="60000">1min</option>
                                                                <option value="90000">1.5min</option>
                                                                <option value="180000">3min</option>
                                                                <option value="300000">5min</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sel1">Post Time:</label>
                                                            <select class="form-control" id="post_time" name="post_time" required>
                                                                <option value="30000">30sec</option>
                                                                <option value="60000">1min</option>
                                                                <option value="90000">1.5min</option>
                                                                <option value="180000">3min</option>
                                                                <option value="300000">5min</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <input type="button" name="pole_post_time" onclick="set_poll_post_time('<?php echo $state; ?>')"
                                                           class="btn btn-primary w-100" id="update_poll_post" value="Set Pole/Post Time">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Set DutyCycle -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label for="formControlRange">
                                                        Duty Cycle: <span id="dutyCycleValue">-</span>%
                                                    </label>
                                                    <input onchange="showVal(this.value)" type="range"
                                                           class="form-control-range" id="formControlRange"
                                                           name="range_val">
                                                </div>
                                                <div class="form-group">
                                                    <input type="button" class="btn btn-primary w-100"
                                                           name="dc_update" id="update_dc_btn"
                                                           onclick="update_dutycycle('<?php echo $state; ?>', document.getElementsByName('range_val')[0].value)"
                                                           value="Set DutyCycle">
                                                </div>

                                                <script>
                                                    function showVal(newVal){
                                                        document.getElementById("dutyCycleValue").innerHTML=newVal;
                                                    }
                                                    // document.getElementById("dutyCycleValue").innerHTML='50';
                                                </script>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $state = 'New South Wales'; ?>
                <div class="modal" id="nsw">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo $state; ?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="card-body">
                                <div class="card-body">
                                    <!--Communication Method-->
                                    <div class="row" id="communication_block_nsw">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", 'WiFi', 'communication_block_nsw'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-danger text-white">
                                                    <div class="card-body p-2">
                                                        WiFi
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", '3G', 'communication_block_nsw'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-secondary text-white">
                                                    <div class="card-body p-2">
                                                        3G
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", '4G', 'communication_block_nsw'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-success text-white">
                                                    <div class="card-body p-2">
                                                        4G
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", 'LORA', 'communication_block_nsw'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-body p-2">
                                                        LORA
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!--Relay Operation-->
                                    <div class="row" id="relay_block_nsw">
                                        <div class="card-body" id="relay_operation_block">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="#" onclick="relay_operation(<?php echo '\''.$state.'\''.', \'OFF\'', ', \'relay_block_nsw\''; ?>)" class="text-white text-decoration-none">
                                                        <div class="card bg-success text-white">
                                                            <div class="card-body p-2">
                                                                Off Peak
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="#" onclick="relay_operation(<?php echo '\''.$state.'\''.', \'ON\'', ', \'relay_block_nsw\''; ?>)" class="text-white text-decoration-none">
                                                        <div class="card bg-info text-white">
                                                            <div class="card-body p-2">
                                                                Main
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Set Pole/Post Time -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sel1">Pole Time:</label>
                                                            <select class="form-control" id="pole_time" name="pole_time" required>
                                                                <option value="30000">30sec</option>
                                                                <option value="60000">1min</option>
                                                                <option value="90000">1.5min</option>
                                                                <option value="180000">3min</option>
                                                                <option value="300000">5min</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sel1">Post Time:</label>
                                                            <select class="form-control" id="post_time" name="post_time" required>
                                                                <option value="30000">30sec</option>
                                                                <option value="60000">1min</option>
                                                                <option value="90000">1.5min</option>
                                                                <option value="180000">3min</option>
                                                                <option value="300000">5min</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <input type="button" name="pole_post_time" onclick="set_poll_post_time('<?php echo $state; ?>')"
                                                           class="btn btn-primary w-100" id="update_poll_post" value="Set Pole/Post Time">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Set DutyCycle -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label for="formControlRange">
                                                        Duty Cycle: <span id="dutyCycleValue">-</span>%
                                                    </label>
                                                    <input onchange="showVal(this.value)" type="range"
                                                           class="form-control-range" id="formControlRange"
                                                           name="range_val">
                                                </div>
                                                <div class="form-group">
                                                    <input type="button" class="btn btn-primary w-100"
                                                           name="dc_update" id="update_dc_btn"
                                                           onclick="update_dutycycle('<?php echo $state; ?>', document.getElementsByName('range_val')[0].value)"
                                                           value="Set DutyCycle">
                                                </div>

                                                <script>
                                                    function showVal(newVal){
                                                        document.getElementById("dutyCycleValue").innerHTML=newVal;
                                                    }
                                                    // document.getElementById("dutyCycleValue").innerHTML='50';
                                                </script>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $state = 'Victoria'; ?>
                <div class="modal" id="vt">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo $state; ?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="card-body">
                                <div class="card-body">
                                    <!--Communication Method-->
                                    <div class="row" id="communication_block_vt">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", 'WiFi', 'communication_block_vt'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-danger text-white">
                                                    <div class="card-body p-2">
                                                        WiFi
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", '3G', 'communication_block_vt'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-secondary text-white">
                                                    <div class="card-body p-2">
                                                        3G
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", '4G', 'communication_block_vt'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-success text-white">
                                                    <div class="card-body p-2">
                                                        4G
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", 'LORA', 'communication_block_vt'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-body p-2">
                                                        LORA
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!--Relay Operation-->
                                    <div class="row" id="relay_block_vt">
                                        <div class="card-body" id="relay_operation_block">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="#" onclick="relay_operation(<?php echo '\''.$state.'\''.', \'OFF\'', ', \'relay_block_vt\''; ?>)" class="text-white text-decoration-none">
                                                        <div class="card bg-success text-white">
                                                            <div class="card-body p-2">
                                                                Off Peak
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="#" onclick="relay_operation(<?php echo '\''.$state.'\''.', \'ON\'', ', \'relay_block_vt\''; ?>)" class="text-white text-decoration-none">
                                                        <div class="card bg-info text-white">
                                                            <div class="card-body p-2">
                                                                Main
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Set Pole/Post Time -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sel1">Pole Time:</label>
                                                            <select class="form-control" id="pole_time" name="pole_time" required>
                                                                <option value="30000">30sec</option>
                                                                <option value="60000">1min</option>
                                                                <option value="90000">1.5min</option>
                                                                <option value="180000">3min</option>
                                                                <option value="300000">5min</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sel1">Post Time:</label>
                                                            <select class="form-control" id="post_time" name="post_time" required>
                                                                <option value="30000">30sec</option>
                                                                <option value="60000">1min</option>
                                                                <option value="90000">1.5min</option>
                                                                <option value="180000">3min</option>
                                                                <option value="300000">5min</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <input type="button" name="pole_post_time" onclick="set_poll_post_time('<?php echo $state; ?>')"
                                                           class="btn btn-primary w-100" id="update_poll_post" value="Set Pole/Post Time">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Set DutyCycle -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label for="formControlRange">
                                                        Duty Cycle: <span id="dutyCycleValue">-</span>%
                                                    </label>
                                                    <input onchange="showVal(this.value)" type="range"
                                                           class="form-control-range" id="formControlRange"
                                                           name="range_val">
                                                </div>
                                                <div class="form-group">
                                                    <input type="button" class="btn btn-primary w-100"
                                                           name="dc_update" id="update_dc_btn"
                                                           onclick="update_dutycycle('<?php echo $state; ?>', document.getElementsByName('range_val')[0].value)"
                                                           value="Set DutyCycle">
                                                </div>

                                                <script>
                                                    function showVal(newVal){
                                                        document.getElementById("dutyCycleValue").innerHTML=newVal;
                                                    }
                                                    // document.getElementById("dutyCycleValue").innerHTML='50';
                                                </script>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $state = 'Tasmania'; ?>
                <div class="modal" id="tm">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo $state; ?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="card-body">
                                <div class="card-body">
                                    <!--Communication Method-->
                                    <div class="row" id="communication_block_tm">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", 'WiFi', 'communication_block_tm'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-danger text-white">
                                                    <div class="card-body p-2">
                                                        WiFi
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", '3G', 'communication_block_tm'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-secondary text-white">
                                                    <div class="card-body p-2">
                                                        3G
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", '4G', 'communication_block_tm'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-success text-white">
                                                    <div class="card-body p-2">
                                                        4G
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                            <a href="#" onclick="wireless_connection(<?php echo '\''.$state.'\''.", 'LORA', 'communication_block_tm'"; ?>)" class="text-white text-decoration-none">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-body p-2">
                                                        LORA
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!--Relay Operation-->
                                    <div class="row" id="relay_block_tm">
                                        <div class="card-body">
                                            <div class="row">
                                                <div id="relay_operation_block">
                                                    <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                        <a href="#" onclick="relay_operation(<?php echo '\''.$state.'\''.', \'OFF\'', ', \'relay_block_tm\''; ?>)" class="text-white text-decoration-none">
                                                            <div class="card bg-success text-white">
                                                                <div class="card-body p-2">
                                                                    Off Peak
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                        <a href="#" onclick="relay_operation(<?php echo '\''.$state.'\''.', \'ON\'', ', \'relay_block_tm\''; ?>)" class="text-white text-decoration-none">
                                                            <div class="card bg-info text-white">
                                                                <div class="card-body p-2">
                                                                    Main
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Set Pole/Post Time -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sel1">Pole Time:</label>
                                                            <select class="form-control" id="pole_time" name="pole_time" required>
                                                                <option value="30000">30sec</option>
                                                                <option value="60000">1min</option>
                                                                <option value="90000">1.5min</option>
                                                                <option value="180000">3min</option>
                                                                <option value="300000">5min</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sel1">Post Time:</label>
                                                            <select class="form-control" id="post_time" name="post_time" required>
                                                                <option value="30000">30sec</option>
                                                                <option value="60000">1min</option>
                                                                <option value="90000">1.5min</option>
                                                                <option value="180000">3min</option>
                                                                <option value="300000">5min</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <input type="button" name="pole_post_time" onclick="set_poll_post_time('<?php echo $state; ?>')"
                                                           class="btn btn-primary w-100" id="update_poll_post" value="Set Pole/Post Time">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Set DutyCycle -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label for="formControlRange">
                                                        Duty Cycle: <span id="dutyCycleValue">-</span>%
                                                    </label>
                                                    <input onchange="showVal(this.value)" type="range"
                                                           class="form-control-range" id="formControlRange"
                                                           name="range_val">
                                                </div>
                                                <div class="form-group">
                                                    <input type="button" class="btn btn-primary w-100"
                                                           name="dc_update" id="update_dc_btn"
                                                           onclick="update_dutycycle('<?php echo $state; ?>', document.getElementsByName('range_val')[0].value)"
                                                           value="Set DutyCycle">
                                                </div>

                                                <script>
                                                    function showVal(newVal){
                                                        document.getElementById("dutyCycleValue").innerHTML=newVal;
                                                    }
                                                    // document.getElementById("dutyCycleValue").innerHTML='50';
                                                </script>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require 'app/footer.inc.php'; ?>

</body>

</html>