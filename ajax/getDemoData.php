<?php
require '../app/db.php';
$m = $_GET["mac"];
$type = $_GET["type"];
$order_query="ORDER BY id DESC LIMIT 100 ";
//echo $me;
//$sql = "SELECT * FROM api_data $order_query";
$sql = "SELECT * from (
                            select * from recorded_values WHERE mac='".$m."' $order_query
                        ) tmp order by tmp.id asc";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $obj = array();
    while($row = $result->fetch_assoc()) {
//        $time = get_time($row["date_now"]);
//        $date = get_date($row["time_now"]);
        $time = $row["time_now"];
        $date = $row["date_now"];
//        $date_time = $date.' ('.$time.')';
        $element = array(
//            $row["time_now"],
            $date = $row["date_time"],
            $row["current_values"],
            $row["voltage_values"],
            $row["power_values"]
        );
        array_push($obj,$element);
    }
}
echo json_encode($obj);
$con->close();

function get_date($timestamp){
    $new_time = explode(" ",$timestamp);
    return $new_time[0];
}
function get_time($timestamp){
    $new_time = explode(" ",$timestamp);
    return date("g:i a", strtotime($new_time[1]));
}
?>

