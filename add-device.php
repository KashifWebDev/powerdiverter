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

                    <!-- Page Heading -->
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseAddNewDevice" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Add New Device</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseAddNewDevice">
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Device Name</label>
                                                <input name="device_name" type="text" class="form-control" id="exampleInputEmail1"  placeholder="Enter Device Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Device MAC</label>
                                                <input name="device_mac" type="text" class="form-control"  placeholder="11:22:33:44:55">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">System ID</label>
                                                <input name="system_id" type="text" class="form-control"  placeholder="22345644456777543322">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Select State</label>
                                                <select name="state" class="form-control" id="exampleFormControlSelect1">
                                                    <option value="Western Australia">Western Australia</option>
                                                    <option value="Northern Territory">Northern Territory</option>
                                                    <option value="South Australia">South Australia</option>
                                                    <option value="Queensland">Queensland</option>
                                                    <option value="New South Wales">New South Wales</option>
                                                    <option value="Victoria">Victoria</option>
                                                    <option value="Tasmania">Tasmania</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Select Device Category</label>
                                                <select name="cat" class="form-control" id="exampleFormControlSelect1">
                                                    <option value="Solar">Solar</option>
                                                    <option value="Hot Water">Hot Water</option>
                                                    <option value="Air Conditioner">Air Conditioner</option>
                                                    <option value="Batteries">Batteries</option>
                                                    <option value="Pool Pumps">Pool Pumps</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">City</label>
                                                <input id="pac-input" type="text" class="form-control pac-target-input"  placeholder="Search Location">
                                                <div id="google_map"></div>
                                                <input type="hidden" name="lat" id="area_lat">
                                                <input type="hidden" name="lng" id="area_lng">
                                                <input type="hidden" name="short_addr" id="short_address">
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100" name="add-device">Add</button>
                                        </form>
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


<script>
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('google_map'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13,
            mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();

            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var lat_val = place.geometry.location.lat();
                var lng_val = place.geometry.location.lng();
                //var addr = place.address_components[3].short_name;
                var addr = place.address_components[3];
                console.log(addr);
                console.log("Lat: "+lat_val+"\nLong: "+lng_val);
                document.getElementById("area_lat").value = lat_val;
                document.getElementById("area_lng").value = lng_val;
                document.getElementById("short_address").value = addr;
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });




    }
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUBvIQ5yNJkBmL8lOtVr44tzLmT2d1Hh8&libraries=places&callback=initAutocomplete"
        async defer></script>

<?php
if(isset($_POST["add-device"])){
    $device_name = $_POST["device_name"];
    $device_mac = $_POST["device_mac"];
    $system_id = $_POST["system_id"];
    $state = $_POST["state"];
    $cat = $_POST["cat"];
    $lat = $_POST["lat"];
    $lng = $_POST["lng"];

    $err="no";
    $select = mysqli_query($con, "SELECT * FROM devices WHERE mac = '".$device_mac."'") or exit(mysqli_error($con));
    if(mysqli_num_rows($select)) {
        $err="yes";
        echo '<script>alert("Mac Address is already being used!");</script>';
        echo '<script>window.location.href = "add.php";</script>';
    }
    $select = mysqli_query($con, "SELECT * FROM devices WHERE system_id = '".$system_id."'") or exit(mysqli_error($con));
    if(mysqli_num_rows($select)) {
        $err="yes";
        echo '<script>alert("SystemID is already being used!");</script>';
        exit();
        die();
    }
    $select = mysqli_query($con, "SELECT * FROM devices WHERE device_name = '".$device_name."'") or exit(mysqli_error($con));
    if(mysqli_num_rows($select)) {
        $err="yes";
        echo '<script>alert("Device Name is already being used!");</script>';
        exit();
        die();
    }

    $sql = "INSERT INTO devices (device_name, mac, category, system_id, state, lat, lng, power_status, dutycycle) 
                        VALUES ('$device_name', '$device_mac', '$cat', '$system_id', '$state', '$lat', '$lng', 1, 50)
                        ";
    if(mysqli_query($con, $sql) and $err=="no"){
        echo '<script>alert("Device Added Successfully!");</script>';
    }else {
        echo "Error! : " . $sql . "" . mysqli_error($con);
    }
}

?>
