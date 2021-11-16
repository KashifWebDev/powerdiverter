<?php
require '../app/db.php';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$command = isset($_POST['command']) ? $_POST['command'] : '';
//$command = $_POST['command'];

switch ($command){
    case 'device_staus':
        $status = $_POST['power_status'];
        $sql = "UPDATE devices SET power_status=$status WHERE ID=$id";
        echo mysqli_query($con, $sql);
        break;
    case 'pole_post_time':
        $pole = $_POST["pole"];
        $post = $_POST["post"];
        $sql = "UPDATE devices SET pole_time_interval=$pole, post_time_interval=$post WHERE state='$id'";
        echo mysqli_query($con, $sql);
//        echo $sql;
        break;
    case 'wireless_connection':
        $id = $_POST["id"];
        $var = $_POST["method"];
        $sql = "UPDATE devices SET communication_method='".$var."' WHERE state='$id'";
        echo mysqli_query($con, $sql);
        break;
    case 'relay':
        $id = $_POST["id"];
        $new_relay = $_POST["relay_status"];
        $sql = "UPDATE devices SET relay_status='$new_relay' WHERE state='$id'";
        echo mysqli_query($con, $sql);
        break;
    case 'update_dc':
        $id = $_POST["id"];
        $var = $_POST["new_dc"];
        $sql = "UPDATE devices SET dutycycle_1=$var WHERE state='$id'";
        echo mysqli_query($con, $sql);
        break;
    default:
        echo false;
}

?>
