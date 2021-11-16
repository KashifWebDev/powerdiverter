<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


require '../app/db.php';
$id = $_GET["device_id"];
$mac = $_GET["mac"];

$sql1 = "SELECT * FROM recorded_values WHERE mac='$mac' ORDER BY id  DESC LIMIT 1";
//echo $sql1;
$res1 = mysqli_query($con, $sql1);
$record = mysqli_fetch_array($res1);
//print_r($record);

$sql = "SELECT * FROM devices WHERE ID=$id";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result)) {
    while($row = $result->fetch_assoc()) {
        $element = array(
            $row["last_pole"],
            $row["last_post"],
            $record["current_values"],
            $record["voltage_values"],
            $record["power_values"],
            $row["dutycycle"],
        );
    }
}
echo json_encode($element);

function get_date($timestamp){
    $new_time = explode(" ",$timestamp);
    return $new_time[0];
}
function get_time($timestamp){
    $new_time = explode(" ",$timestamp);
    return date("g:i a", strtotime($new_time[1]));
}
?>

