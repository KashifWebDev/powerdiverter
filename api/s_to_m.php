<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


require '../app/db.php';

date_default_timezone_set("Asia/Karachi");
$a = date("h:i:sa");
//echo date("d-M,Y  g:i a", strtotime($a));
$date_now = date("d-M,Y", strtotime($a));
$time_now = date("g:i a", strtotime($a));


$data = json_decode(file_get_contents("php://input"));

if(isset($data->Machine_ID))
{
    $mac_id=$data->Machine_ID;
    //echo $device_mac.'  '.$device_status;
    $last_post = $date_now.' '.$time_now;

    $sql = "UPDATE devices SET last_post='$last_post' WHERE mac='$mac_id'";
    mysqli_query($con, $sql);

    $sql="SELECT * FROM devices WHERE mac='$mac_id'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_array($result);
        echo json_encode(
            array(
                'Machine_ID' => $row["mac"],
                'Location' => $row["Location"],
                'Duty_Cycle' => $row["dutycycle_1"],
                'Relay' => $row["relay_status"],
                'Comm' => $row["communication_method"],
                'Polling_time' => $row["pole_time_interval"],
                'Posting_time' => $row["post_time_interval"],
            )
        );
    }else{
        $post_arr = array(
            'Message' => 'No record found agains your MAC Address!',
            'Response' => 'NACK'
        );
    }
}else{
    $post_arr = array(
        'Message' => 'Parameters are not correctly set!',
        'Response' => 'NACK'
    );
}


print_r(json_encode($post_arr));

?>