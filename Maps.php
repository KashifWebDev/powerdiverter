<?php
require 'app/app.php';


if(isset($_GET["area"])){
    $id=$_GET["area"];
}else{
    $id = "";
}

$id = trim($id);
$id = strip_tags($id);
$page_title=$id;
switch ($id) {
    case "vt":
        $page_title="Victoria";
        $center="
                zoom: 7.2,
                center: new google.maps.LatLng(-36.71372512079631, 145.32356345457492),";
        break;
    case "wa":
        $page_title="Western Australia";
        $center="
                zoom: 7.2,
                center: new google.maps.LatLng(-26.800160462195887, 122.70843013088438),";
        break;
    case "nsw":
        $page_title="New South Wales";
        $center="
                zoom: 7.2,
                center: new google.maps.LatLng(-33.69164758665552, 146.49265977839582),";
        break;
    case "nt":
        $page_title="Northern Territory";
        $center="
                zoom: 7.2,
                center: new google.maps.LatLng(-20.501986991083992, 133.9348200423383),";
        break;
    case "ql":
        $page_title="QueensLand";
        $center="
                zoom: 7.2,
                center: new google.maps.LatLng(-23.637318333613326, 145.4924372298383),";
        break;
    case "sa":
        $page_title="South Australia";
        $center="
                zoom: 7.2,
                center: new google.maps.LatLng(-29.98618940830199, 135.7365778548383),";
        break;
    case "tm":
        $page_title="Tasmania";
        $center="
                zoom: 7.2,
                center: new google.maps.LatLng(-42.48227924574935, 146.7229059798383),";
        break;
    default:
        $center="
                zoom: 5,
                center: new google.maps.LatLng(-25.274399, 133.775131),";
}
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'app/head.inc.php'; ?>

<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyCUBvIQ5yNJkBmL8lOtVr44tzLmT2d1Hh8&v=3"></script>

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

                    <!-- Page Heading -->
                    <div id="map" style="width: 100%; height: 700px;"></div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require 'app/footer.inc.php'; ?>

</body>

</html>

<script type="text/javascript">
    var locations = [
        <?php
        $cat="All Devices";
        if($cat=="All Devices"){
            $sql = "SELECT * FROM devices";
        }
        else{
            $sql = "SELECT * FROM devices WHERE category='$cat'";
        }
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            $loop_name=$row['device_name'];
            $loop_lat=$row['lat'];
            $loop_lng=$row['lng'];
            $loop_cat=$row['category'];
            echo "[";
            echo "'<b>Device Name: </b>".$loop_name."<br><b>Category: </b>".$loop_cat."', ";
            echo $loop_lat.", ";
            echo $loop_lng.", ";
            echo "],\n";
        }
        ?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        <?php echo $center; ?>
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
</script>