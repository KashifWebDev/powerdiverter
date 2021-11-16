<?php
require 'app/app.php';
$id= mysqli_real_escape_string($con, trim($_GET["id"])) ;
$id = strip_tags($id);

$actual_link = "device-details.php?id=".$id;
$sql = "SELECT * FROM devices WHERE ID=$id";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);

$device_name = $row["device_name"];
$device_mac = $row["mac"];
$device_category = $row["category"];
$device_sys_id = $row["system_id"];
$device_state = $row["state"];
$device_lat = $row["lat"];
$device_long = $row["lng"];
$device_status = $row["power_status"];
$device_dutycycle = $row["dutycycle"];
$device_dutycycle_1 = $row["dutycycle_1"];
$device_radio_status = $row["radio_status"];
$device_relay_status = $row["relay_status"];
$device_communication_method = $row["communication_method"];
$device_last_pole = $row["last_pole"];
$device_last_post = $row["last_post"];
$pole_interval = $row["pole_time_interval"];
$post_interval = $row["post_time_interval"];
$schedule_dutycycle = $row["schedule_dutycycle"];
$schedule_start_time = $row["schedule_start_time"];
$schedule_end_time = $row["schedule_end_time"];

$page_title= $device_name;

// For Scheduled Duty Cycle
// ============= For TIme
$time = "2019-12-08";
date_default_timezone_set("Asia/Karachi");
//$date = date('m/d/Y h:i:s a', time());
$start_time = date("H:i:s", strtotime($schedule_start_time));
$end_time = date("H:i:s", strtotime($schedule_end_time));
$current_time = date('H:i:s', time());
//======================== Listing all
/*echo 'Start Time: '.$start_time.'<br>';
echo 'End Time: '.$end_time.'<br>';
echo 'Current Time: '.$current_time.'<br>';*/
if(($start_time < $current_time || $start_time == $current_time) &&
    ($end_time > $current_time || $end_time == $current_time)){
    //echo '<br> TIme Condition Matched!';
    $device_dutycycle_1 = $schedule_dutycycle;
}
?>
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
                    <h1 class="h3 mb-4 text-gray-800">Device Details</h1>

                    <!-- Page Heading -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#device_info">Info</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#device_settings">Settings</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Graphs">Graphs</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#SetParameters">Set Parameters</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Demo">New Tab</a>
                      </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content mt-3">
                        <!-- Device Info -->
                      <div class="tab-pane active" id="device_info">
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Device Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-3">
                                            <table>
                                                <tr>
                                                    <td class="font-weight-bold">Name</td>
                                                    <td class="pl-2"><?php echo $device_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Mac Addrres </td>
                                                    <td class="pl-2"><?php echo $device_mac ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Category</td>
                                                    <td class="pl-2"><?php echo $device_category ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">System ID</td>
                                                    <td class="pl-2"><?php echo $device_sys_id ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">State</td>
                                                    <td class="pl-2"><?php echo $device_state ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Duty Cycle</td>
                                                    <td class="pl-2"><?php echo $device_dutycycle.' %'; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6 col-xl-3">
                                            <table>
                                                <tr>
                                                    <td class="font-weight-bold">Data Sent</td>
                                                    <td class="pl-2"><?php echo $device_last_pole ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Data Received</td>
                                                    <td class="pl-2"><?php echo $device_last_post; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Radio Status</td>
                                                    <td class="pl-2"><?php echo $device_radio_status; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Relay Status </td>
                                                    <td class="pl-2"><?php echo $device_relay_status ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Power Status</td>
                                                    <td class="pl-2">
                                                            <?php if($device_status){
                                                                echo '<span class="text-success font-weight-bold">Online</span>';
                                                            }else{
                                                                echo '<span class="text-danger font-weight-bold">Offline</span>';
                                                            }
                                                            ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div>
                        <!-- Device Settings -->
                      <div class="tab-pane fade" id="device_settings">
                        <div class="row">
                            <!-- Connectivity Method -->
                            <div class="col-md-6 col-lg-5">
                                  <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseConnectivityTechnology" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">Connectivity Technology <span class="font-weight-normal">(click to select)</span></h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseConnectivityTechnology">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                                    <a href="device-details.php?id=<?php echo $id; ?>&comm_status=WiFi" class="text-white text-decoration-none">
                                                        <div class="card bg-danger text-white bg_danger_hover">
                                                            <div class="card-body">
                                                                WiFi
                                                                <?php if($device_communication_method=="WiFi"){
                                                                    echo '<span class="text-xs">(Selected)</span>';
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                                    <a href="device-details.php?id=<?php echo $id; ?>&comm_status=3G" class="text-white text-decoration-none">
                                                        <div class="card bg-secondary text-white bg_secondary_hover">
                                                            <div class="card-body">
                                                                3G
                                                                <?php if($device_communication_method=="3G"){
                                                                    echo '<span class="text-xs">(Selected)</span>';
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                                    <a href="device-details.php?id=<?php echo $id; ?>&comm_status=4G" class="text-white text-decoration-none">
                                                        <div class="card bg-success text-white bg_success_hover">
                                                            <div class="card-body">
                                                                4G
                                                                <?php if($device_communication_method=="4G"){
                                                                    echo '<span class="text-xs">(Selected)</span>';
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                                    <a href="device-details.php?id=<?php echo $id; ?>&comm_status=LORA" class="text-white text-decoration-none">
                                                        <div class="card bg-primary text-white bg_primary_hover">
                                                            <div class="card-body">
                                                                LORA
                                                                <?php if($device_communication_method=="LORA"){
                                                                    echo '<span class="text-xs">(Selected)</span>';
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <?php
                                                    if(isset($_GET["comm_status"])){
                                                        $var = $_GET["comm_status"];
                                                        $sql = "UPDATE devices SET communication_method='".$var."' WHERE ID=$id";
                                                        //echo '<script>alert("'.$sql.'");</script>';
                                                        if(mysqli_query($con, $sql)){
                                                            redirect($actual_link);
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <!-- Device Status -->
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseDeviceStatus" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">Device Status</h6>
                                    </a>
                                    <?php if ($device_status){
                                        $device_online_status = "ONLINE";
                                        $device_online_status_btn_class = "danger";
                                        $device_online_status_text = "Turn Off";
                                        $device_online_status_text_class = "success";
                                        $device_online_status_link = $actual_link.'&switch_status=PowerOff';
                                    }else{
                                        $device_online_status = "OFFLINE";
                                        $device_online_status_btn_class = "success";
                                        $device_online_status_text = "Turn On";
                                        $device_online_status_text_class = "danger";
                                        $device_online_status_link = $actual_link.'&switch_status=PowerOn';
                                    }
                                    ?>
                                    <div class="collapse show" id="collapseDeviceStatus" style="">
                                        <div class="card-body">
                                            <p class="font-weight-bold">
                                                <span class="mr-2">Device Status</span>
                                                <span class="text-<?php echo $device_online_status_text_class; ?>"><?php echo $device_online_status; ?></span>
                                            </p>
                                            <a href="<?php echo $device_online_status_link; ?>" class="btn btn-<?php echo $device_online_status_btn_class; ?> btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-power-off"></i>
                                                </span>
                                                <span class="text"><?php echo $device_online_status_text; ?></span>
                                            </a>
                                        </div>
                                        <?php
                                        if(isset($_GET["switch_status"])){
                                            $var = $_GET["switch_status"];
                                            if($var == "PowerOff"){
                                                $sql = "UPDATE devices SET power_status=0 WHERE ID=$id";
                                            }
                                            if($var == "PowerOn"){
                                                $sql = "UPDATE devices SET power_status=1 WHERE ID=$id";
                                            }
                                            if(mysqli_query($con, $sql)){
                                                redirect($actual_link);
                                            }

                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <!-- Device Status -->
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseRelayOperation" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">Relay Operation (click to select)</h6>
                                    </a>
                                    <div class="collapse show" id="collapseRelayOperation" style="">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="device-details.php?id=<?php echo $id; ?>&relay_status=RelayOn" class="text-white text-decoration-none">
                                                        <div class="card bg-success text-white bg_success_hover">
                                                            <div class="card-body">
                                                                Off Peak
                                                                <span class="text-xs">
                                                                    <?php if($device_relay_status=="ON") echo '<span class="text-xs">(Selected)</span>'; ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="device-details.php?id=<?php echo $id; ?>&relay_status=RelayOff" class="text-white text-decoration-none">
                                                        <div class="card bg-info text-white bg_info_hover">
                                                            <div class="card-body">
                                                                Main
                                                                <?php if($device_relay_status=="OFF") echo '<span class="text-xs">(Selected)</span>'; ?>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php
                                                if(isset($_GET["relay_status"])){
                                                    $var = $_GET["relay_status"];
                                                    if($var == "RelayOff"){
                                                        $sql = "UPDATE devices SET relay_status='OFF' WHERE ID=$id";
                                                    }
                                                    if($var == "RelayOn"){
                                                        $sql = "UPDATE devices SET relay_status='ON' WHERE ID=$id";
                                                    }
                                                    if(mysqli_query($con, $sql)){
                                                        redirect($actual_link);
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                        <!-- Recent Graphs -->
                      <div class="tab-pane fade" id="Graphs">
                          <script type="text/javascript" src="assets/vendor/canvas-js/canvasjs.min.js"></script>
                          <div class="row">
                              <div class="col-md-12">

                                  <div id="currentChart" style="height: 100%;"></div>
                                  <?php
                                  $mac = "3C:71:BF:8C:08:74";
                                  ?>
                                  <script>
                                      window.onload = function () {
                                          var temp = new CanvasJS.Chart("currentChart", {
                                                    height: 400,
                                                  zoomEnabled: true,
                                                  animationEnabled: true,
                                                  title: {
                                                      text: "Last Data"
                                                  },
                                                      // fontFamily: 'Helvetica Neue, Helvetica, Arial, sans-serif',
                                                      fontWeight: "lighter",
                                                           fontWeight: "Normal",
                                                      legend: {
                                                          cursor: "pointer",
                                                          fontSize: 16,
                                                          // itemclick: toggleDataSeries
                                                      },
                                                      toolTip: {
                                                          shared: true
                                                      },
                                                      axisY: {
                                                          includeZero: false,
                                                          lineThickness: 1,
                                                          gridColor: "#ffffff1f"
                                                      },
                                                      // axisX: {
                                                      //     labelMaxWidth: 100,
                                                      //     labelAngle: -90 / 90
                                                      // },
                                                      data: [
                                                          {
                                                              name: "Current",
                                                              type: "spline",
                                                              showInLegend: true,
                                                              dataPoints: []
                                                          },
                                                          {
                                                              name: "Voltage",
                                                              type: "spline",
                                                              showInLegend: true,
                                                              dataPoints: []
                                                          },
                                                          {
                                                              name: "Power",
                                                              type: "spline",
                                                              showInLegend: true,
                                                              dataPoints: []
                                                          },
                                                      ]
                                                  }
                                          );
                                      function valve_update() {
                                          $.getJSON("ajax/getDemoData.php",{mac: "<?php echo $device_mac; ?>", type: "power"}, function(data) {
                                              temp.options.data[0].dataPoints = [];
                                              temp.options.data[1].dataPoints = [];
                                              temp.options.data[2].dataPoints = [];
                                              $.each((data), function(key, value){
                                                  // console.log(key);
                                                  temp.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
                                                  temp.options.data[1].dataPoints.push({label: value[0], y: parseInt(value[2])});
                                                  temp.options.data[2].dataPoints.push({label: value[0], y: parseInt(value[3])});
                                              });
                                          });
                                          temp.render();
                                      }
                                      setInterval(function(){
                                          valve_update();
                                      }, 2000);
                                      }
                                  </script>
                              </div>
                          </div>
                      </div>
                        <!-- Set Parameters -->
                      <div class="tab-pane fade" id="SetParameters">
                          <div class="row">
                              <!-- Set Pole Post Time -->
                              <div class="col-md-4">
                                  <div class="card shadow mb-4">
                                      <a href="#collapsePoleTime" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                          <h6 class="m-0 font-weight-bold text-primary">Set Pole/Post Time</h6>
                                      </a>
                                      <div class="collapse show" id="collapsePoleTime">
                                          <div class="card-body">
                                              <form class="form-horizontal" action="" method="post">
                                                  <div class="form-group">
                                                      <div class="form-group">
                                                          <label for="sel1">Select Pole Time:</label>
                                                          <select class="form-control" id="sel1" name="pole_time" required>
                                                              <option value="30000" <?php if($pole_interval=="30000") echo "Selected"; ?>>30sec<?php if($pole_interval=="30000") echo "(Selected)" ?></option>
                                                              <option value="60000" <?php if($pole_interval=="60000") echo "Selected"; ?>>1min<?php if($pole_interval=="60000") echo "(Selected)" ?></option>
                                                              <option value="90000" <?php if($pole_interval=="90000") echo "Selected"; ?>>1.5min<?php if($pole_interval=="90000") echo "(Selected)" ?></option>
                                                              <option value="180000" <?php if($pole_interval=="180000") echo "Selected"; ?>>3min<?php if($pole_interval=="180000") echo "(Selected)" ?></option>
                                                              <option value="300000" <?php if($pole_interval=="300000") echo "Selected"; ?>>5min<?php if($pole_interval=="300000") echo "(Selected)" ?></option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <div class="form-group">
                                                          <label for="sel1">Select Post Time:</label>
                                                          <select class="form-control" id="sel1" name="post_time" required>
                                                              <option value="30000" <?php if($post_interval=="30000") echo "Selected"; ?>>30sec<?php if($post_interval=="30000") echo "(Selected)" ?></option>
                                                              <option value="60000" <?php if($post_interval=="60000") echo "Selected"; ?>>1min<?php if($post_interval=="60000") echo "(Selected)" ?></option>
                                                              <option value="90000" <?php if($post_interval=="90000") echo "Selected"; ?>>1.5min<?php if($post_interval=="90000") echo "(Selected)" ?></option>
                                                              <option value="180000" <?php if($post_interval=="180000") echo "Selected"; ?>>3min<?php if($post_interval=="180000") echo "(Selected)" ?></option>
                                                              <option value="300000" <?php if($post_interval=="300000") echo "Selected"; ?>>5min<?php if($post_interval=="300000") echo "(Selected)" ?></option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                          <button name="pole_post_time" type="submit" class="btn btn-primary w-100">
                                                              Save
                                                          </button>
                                                  </div>
                                              </form>
                                              <?php
                                                if(isset($_POST["pole_post_time"])){
                                                    $pole = $_POST["pole_time"];
                                                    $post = $_POST["post_time"];
                                                    $sql = "UPDATE devices SET pole_time_interval=$pole, post_time_interval=$post
                                                            WHERE ID=$id";
                                                    if(mysqli_query($con, $sql)){
                                                        redirect($actual_link);
                                                    }
                                                }
                                                ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- Set Schedule Duty Cycle -->
                              <div class="col-md-4">
                                  <div class="card shadow mb-4">
                                      <a href="#collapseScheduleDutyCycle" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                          <h6 class="m-0 font-weight-bold text-primary">Set Schedule Duty Cycle</h6>
                                      </a>
                                      <div class="collapse show" id="collapseScheduleDutyCycle">
                                          <div class="card-body">
                                              <form class="form-horizontal" action="" method="post">
                                                  <div class="form-group">
                                                      <div class="form-group">
                                                          <label for="sel1">Start Time:</label>
                                                          <input type="time" name="start_time">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <div class="form-group">
                                                          <label for="sel1">End Time:</label>
                                                          <input type="time" name="end_time">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <div class="form-group">
                                                          <label for="sel1">Duty Cycle:</label>
                                                          <input type="number" name="duty_value"  max="100" min="0">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                          <button type="submit" class="btn btn-primary w-100" name="set-schedule">
                                                              Add
                                                          </button>
                                                  </div>
                                              </form>
                                              <?php
                                              if(isset($_POST["set-schedule"])){
                                                  $var = $_POST["start_time"];
                                                  $var1 = $_POST["end_time"];
                                                  $var2 = $_POST["duty_value"];
                                                  $sql = "UPDATE devices SET schedule_dutycycle=$var2, schedule_start_time='$var', schedule_end_time='$var1' WHERE ID=$id";
                                                  if(mysqli_query($con, $sql)){
                                                      echo '<script>window.location = "'.$actual_link.'";</script>';
                                                  }

                                              }
                                              ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- Set Duty Cycle -->
                              <div class="col-md-4">
                                  <div class="card shadow mb-4">
                                      <a href="#collapsePostTime" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                          <h6 class="m-0 font-weight-bold text-primary">Set Duty Cycle</h6>
                                      </a>
                                      <div class="collapse show" id="collapsePostTime">
                                          <div class="card-body">
                                              <form method="post" action="">
                                                  <script>
                                                      function showVal(newVal){
                                                          document.getElementById("dutyCycleValue").innerHTML=newVal;
                                                      }
                                                      document.getElementById("dutyCycleValue").innerHTML='50';
                                                  </script>
                                                  <div class="form-group">
                                                      <label for="formControlRange">
                                                          Duty Cycle: <span id="dutyCycleValue"><?php echo $device_dutycycle_1; ?></span>%
                                                      </label>
                                                          <input onchange="showVal(this.value)" type="range"
                                                                 value="<?php echo $device_dutycycle_1; ?>"
                                                                 class="form-control-range" id="formControlRange"
                                                                 name="range_val">
                                                  </div>
                                                  <div class="form-group">
                                                      <button type="submit" class="btn btn-primary w-100" name="dc_update">
                                                          Set
                                                      </button>
                                                  </div>
                                              </form>
                                              <?php
                                                if(isset($_POST["dc_update"])){
                                                    $var = $_POST["range_val"];
                                                    $sql = "UPDATE devices SET dutycycle_1=$var WHERE ID=$id";
                                                    if(mysqli_query($con, $sql)){
                                                        redirect($actual_link);
                                                    }
                                                }
                                                ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <?php
                            if($schedule_start_time != "00:00:00.000000" && $schedule_end_time != "00:00:00.000000"){
                          ?>
                                <h1 class="h3 mb-4 text-gray-800">Duty Cycle Schedules</h1>
                          <table class="table table-striped">
                              <thead>
                              <tr>
                                  <th>Start Time</th>
                                  <th>End Time</th>
                                  <th>Duty Cycle</th>
                                  <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
<!--                                  <td>--><?php // echo $schedule_start_time; ?><!--</td>-->
                                  <td><?php  echo date('h:i:s a', strtotime($schedule_start_time));; ?></td>
                                  <td><?php  echo date('h:i:s a', strtotime($schedule_end_time));; ?></td>
<!--                                  <td>--><?php // echo $schedule_end_time; ?><!--</td>-->
                                  <td><?php  echo $schedule_dutycycle; ?></td>
                                  <td>
                                      <a href="<?php echo $actual_link; ?>&delete_schedule=1" class="btn btn-danger btn-circle btn-sm">
                                          <i class="fas fa-trash"></i>
                                      </a>
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                          <?php
                            }
                          if(isset($_GET["delete_schedule"])){
                              $default_time = "00:00:00.000000";
                              $sql = "UPDATE devices SET 
                                        	schedule_start_time='$default_time', schedule_end_time='$default_time',
                                        	 schedule_dutycycle=0 WHERE ID=$id";
                              if(mysqli_query($con, $sql)){
//                                  echo '<script>alert("done");</script>';
                                  redirect($actual_link);
                              }
                          }
                          ?>
                      </div>
                        <!-- Demo -->
                      <div class="tab-pane fade" id="Demo">
                          Demo
                      </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require 'app/footer.inc.php'; ?>

</body>

</html>