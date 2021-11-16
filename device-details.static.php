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
                                                    <td class="pl-2">Smart ESP</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Mac Addres </td>
                                                    <td class="pl-2">30:AE:A4:03:7C:64</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Category</td>
                                                    <td class="pl-2">Solar</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">System ID</td>
                                                    <td class="pl-2">30:AE:A4:03:7C:64</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">State</td>
                                                    <td class="pl-2">Victoria</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Duty Cycle</td>
                                                    <td class="pl-2">35 %</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6 col-xl-3">
                                            <table>
                                                <tr>
                                                    <td class="font-weight-bold">Data Sent</td>
                                                    <td class="pl-2">29-Sep,2019 2:35 pm</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Data Recieved</td>
                                                    <td class="pl-2">29-Sep,2019 2:35 pm</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Radio Status</td>
                                                    <td class="pl-2">OFF</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Relay Status </td>
                                                    <td class="pl-2">OFF</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Power Status</td>
                                                    <td class="pl-2"><span class="text-success font-weight-bold">Online</span></td>
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
                                                    <a href="#" class="text-white text-decoration-none">
                                                        <div class="card bg-danger text-white bg_danger_hover">
                                                            <div class="card-body">
                                                                WiFi
                                                                <span class="text-xs">(Selected)</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                                    <a href="#" class="text-white text-decoration-none">
                                                        <div class="card bg-secondary text-white bg_secondary_hover">
                                                            <div class="card-body">
                                                                3G
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                                    <a href="#" class="text-white text-decoration-none">
                                                        <div class="card bg-success text-white bg_success_hover">
                                                            <div class="card-body">
                                                                4G
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                                    <a href="#" class="text-white text-decoration-none">
                                                        <div class="card bg-primary text-white bg_primary_hover">
                                                            <div class="card-body">
                                                                LORA
                                                            </div>
                                                        </div>
                                                    </a>
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
                                    <div class="collapse show" id="collapseDeviceStatus" style="">
                                        <div class="card-body">
                                            <p class="font-weight-bold">
                                                <span class="mr-2">Device Status</span>
                                                <span class="text-success">ONLINE</span>
                                            </p>
                                            <a href="#" class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-power-off"></i>
                                                </span>
                                                <span class="text">Turn Off</span>
                                            </a>
                                        </div>
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
                                                    <a href="#" class="text-white text-decoration-none">
                                                        <div class="card bg-success text-white bg_success_hover">
                                                            <div class="card-body">
                                                                Off Peak
                                                                <span class="text-xs">(Selected)</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">
                                                    <a href="#" class="text-white text-decoration-none">
                                                        <div class="card bg-info text-white bg_info_hover">
                                                            <div class="card-body">
                                                                Main
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
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
                                              height: 1000,
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
                                                      height: 300,
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
                                          $.getJSON("ajax/getDemoData.php",{mac: "<?php echo $mac; ?>", type: "power"}, function(data) {
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
                                              <form class="form-horizontal" action="">
                                                  <div class="form-group">
                                                      <div class="form-group">
                                                          <label for="sel1">Select Pole Time:</label>
                                                          <select class="form-control" id="sel1">
                                                              <option value="30000">30sec</option>
                                                              <option value="60000">1min</option>
                                                              <option value="90000">1.5min</option>
                                                              <option value="180000">3min</option>
                                                              <option value="300000">5min</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <div class="form-group">
                                                          <label for="sel1">Select Post Time:</label>
                                                          <select class="form-control" id="sel1">
                                                              <option value="30000">30sec</option>
                                                              <option value="60000">1min</option>
                                                              <option value="90000">1.5min</option>
                                                              <option value="180000">3min</option>
                                                              <option value="300000">5min</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                          <button type="submit" class="btn btn-primary w-100">
                                                              Save
                                                          </button>
                                                  </div>
                                              </form>
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
                                              <form class="form-horizontal" action="">
                                                  <div class="form-group">
                                                      <div class="form-group">
                                                          <label for="sel1">Start Time:</label>
                                                          <input type="time">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <div class="form-group">
                                                          <label for="sel1">End Time:</label>
                                                          <input type="time">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <div class="form-group">
                                                          <label for="sel1">Duty Cycle:</label>
                                                          <input type="number">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                          <button type="submit" class="btn btn-primary w-100">
                                                              Add
                                                          </button>
                                                  </div>
                                              </form>
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
                                              <form>
                                                  <script>
                                                      function showVal(newVal){
                                                          document.getElementById("dutyCycleValue").innerHTML=newVal;
                                                      }
                                                      document.getElementById("dutyCycleValue").innerHTML='50';
                                                  </script>
                                                  <div class="form-group">
                                                      <label for="formControlRange">
                                                          Duty Cycle: <span id="dutyCycleValue">50</span>
                                                      </label>
                                                      <input onchange="showVal(this.value)" type="range" value="50" class="form-control-range" id="formControlRange">
                                                  </div>
                                                  <div class="form-group">
                                                      <button type="submit" class="btn btn-primary w-100">
                                                          Save
                                                      </button>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
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
                                  <td>01:00 PM</td>
                                  <td>02:00 PM</td>
                                  <td>55</td>
                                  <td>
                                      <a href="#" class="btn btn-danger btn-circle btn-sm">
                                          <i class="fas fa-trash"></i>
                                      </a>
                                  </td>
                              </tr>
                              </tbody>
                          </table>
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