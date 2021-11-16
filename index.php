<?php require 'app/app.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php
 $sql = "SELECT * FROM devices";
 $res = mysqli_query($con, $sql);
 $total_devices = mysqli_num_rows($res);
?>
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
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!--  TOp 4 cards Row -->
                    <div class="row">

                        <!-- Total Devices -->
                        <div class="col-xl-3 col-md-6 mb-4 max-height-65">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body" style="padding: 1px 24px !important;">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Devices</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_devices; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-microchip fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Devices Categories -->
                        <div class="col-xl-3 col-md-6 mb-4 max-height-65">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body" style="padding: 1px 24px !important;">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Devices Categories</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list-ol fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Active Devices -->
                        <div class="col-xl-3 col-md-6 mb-4 max-height-65">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body" style="padding: 1px 24px !important;">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Active Devices
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">40%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                             style="width: 40%" aria-valuenow="50" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-signal fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Alerts -->
                        <div class="col-xl-3 col-md-6 mb-4 max-height-65">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body" style="padding: 1px 24px !important;">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Alerts</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-md-8">
                            <img src="assets/images/map.png" usemap="#image-map">

                            <map name="image-map">
                                <area target="" alt="Western Australia" title="Western Australia" href="Maps.php?area=wa" coords="344,413,127,486,90,458,99,428,87,355,65,262,84,219,169,178,217,145,258,96,299,71,347,86" shape="poly">
                                <area target="" alt="Northern Territory" title="Northern Territory" href="Maps.php?area=nt" coords="350,88,347,296,509,295,509,117,461,88,487,37,405,8,359,47" shape="poly">
                                <area target="" alt="QueensLand" title="QueensLand" href="Maps.php?area=ql" coords="511,119,511,297,564,301,564,357,789,341,779,282,731,220,695,183,654,135,640,92,609,51,587,10,569,122,548,135" shape="poly">
                                <area target="" alt="South Australia" title="South Australia" href="Maps.php?area=sa" coords="346,414,418,423,451,450,467,485,507,438,501,480,511,497,563,558,559,303,348,302" shape="poly">
                                <area target="" alt="New South Wales" title="New South Wales" href="Maps.php?area=nsw" coords="563,364,564,464,586,473,604,490,625,509,651,509,690,509,723,540,739,481,777,402,786,347" shape="poly">
                                <area target="" alt="Victoria" title="Victoria" href="Maps.php?area=vt" coords="563,471,566,556,587,560,612,565,635,553,659,574,688,556,723,543,691,524,621,513,593,490" shape="poly">
                                <area target="" alt="Tasmania" title="Tasmania" href="Maps.php?area=tm" coords="629,620,644,654,644,671,660,688,681,677,685,671,690,655,691,623" shape="poly">
                            </map>
                        </div>
                        <!-- Area Chart -->
<!--                        <div class="col-xl-8 col-lg-7">-->
<!--                            <div class="card shadow mb-4">-->
<!--                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">-->
<!--                                    <h6 class="m-0 font-weight-bold text-primary">Click to Explore Devices</h6>-->
<!--                                </div>-->
<!--                                <div class="card-body">-->
<!--                                    <img src="assets/images/map.png" usemap="#image-map">-->
<!---->
<!--                                    <map name="image-map">-->
<!--                                        <area target="" alt="Western Australia" title="Western Australia" href="Maps.php?area=wa" coords="281,69,295,405,272,414,250,416,222,430,212,449,173,455,145,464,126,480,78,475,80,445,64,399,55,376,45,359,36,337,21,324,30,309,25,295,25,277,22,264,22,241,157,142,161,118,168,109,203,86,212,68,240,52" shape="poly">-->
<!--                                        <area target="" alt="Northern Territory" title="Northern Territory" href="Maps.php?area=nt" coords="452,96,405,69,414,48,417,36,424,28,433,15,360,3,325,16,306,30,282,69,291,286,452,285" shape="poly">-->
<!--                                        <area target="" alt="South Australia" title="South Australia" href="Maps.php?area=sa" coords="505,289,291,287,296,401,351,405,378,415,402,451,408,461,445,464,450,479,491,528" shape="poly">-->
<!--                                        <area target="" alt="Queensland" title="Queensland" href="Maps.php?area=ql" coords="541,2,514,105,503,120,489,121,453,99,454,285,507,286,504,347,715,356,713,307,702,276" shape="poly">-->
<!--                                        <area target="" alt="New South Wales" title="New South Wales" href="Maps.php?area=nsw" coords="713,358,503,348,497,446,515,452,527,459,541,471,551,490,573,487,590,489,602,492,607,508,630,523,698,410" shape="poly">-->
<!--                                        <area target="" alt="Victoria" title="Victoria" href="Maps.php?area=vt" coords="628,525,606,513,602,494,569,488,554,488,542,484,525,465,496,448,491,529,532,542,577,546" shape="poly">-->
<!--                                        <area target="" alt="Tasmania" title="Tasmania" href="Maps.php?area=tm" coords="592,589,571,590,545,580,544,599,550,625,558,635,568,631,578,627,590,607" shape="poly">-->
<!--                                    </map>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Devices in different State</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="dashboardPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Western Australia
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-secondary"></i> Northern Territory
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> South Australia
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Queensland
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> New South Wales
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-dark"></i> Victoria
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-muted"></i> Tasmania
                                        </span>
                                    </div>
                                </div>
                            </div>
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