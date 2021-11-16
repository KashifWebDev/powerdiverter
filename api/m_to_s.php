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

$date_time = "$time_now ($date_now)";


  $data = json_decode(file_get_contents("php://input"));
//   print_r($data);

//   var_dump($data);

  if(isset($data->Comm_Status) && isset($data->Machine_ID) && isset($data->Location) && isset($data->Current) &&
  isset($data->Voltage) && isset($data->Power) && isset($data->Duty_Cycle_Status) && isset($data->Relay_Status) && isset($data->Radio_Status) )
{
  $mac_id = $data->Machine_ID;
  $cur = $data->Current;
  $pow = $data->Power;
  $vol = $data->Voltage;
  $comm_status = $data->Comm_Status;
  $location = $data->Location;
  $dutycycle = $data->Duty_Cycle_Status;
  $relay_status = $data->Relay_Status;
  $radio_status = $data->Radio_Status;
  $last_pole = $date_now.' '.$time_now;

  if($cur == "" || $cur == null || $pow == "" || $pow==null || $vol=="" || $vol==null){
      echo json_encode(
          array(
              'Err_Msg' => 'Current/Voltage/Power Cannot be empty!'
          )
      );
      exit();
      die();
  }

    //echo $mac_id.'  '.$cur;
    $sql = "SELECT * FROM devices WHERE mac='$mac_id'";
    $res = mysqli_query($con, $sql);
    if(!mysqli_num_rows($res)>0){
        echo json_encode(
            array(
                'Err_Msg' => 'No Valid MAC/SystemID Found for your request!'
            )
        );
        exit();
        die();
    }


    
        $sql = "INSERT INTO recorded_values (mac, voltage_values, current_values, power_values, date_now, time_now, date_time)
        VALUES ('$mac_id' ,'$vol', '$cur', '$pow', '$date_now', '$time_now', '$date_time')";

/*
        $sql1 = "UPDATE devices SET communication_method='$comm_status',Location='$location',dutycycle='$dutycycle',
                relay_status='$relay_status', radio_status='$radio_status', last_pole ='$last_pole'
                WHERE mac='$mac_id'";
   */

        $sql1 = "UPDATE devices SET dutycycle='$dutycycle', radio_status='$radio_status', last_pole ='$last_pole'
                WHERE mac='$mac_id'";



    if(mysqli_query($con, $sql) and mysqli_query($con, $sql1) ){
            echo json_encode(
              array(
                  'MAC Address' => $mac_id,
                  'Response' => 'ACK'
              )
            );
    } else{
        //err_msg($req, $mobile_mac, $mach_mac);
        echo "ERROR: Could not able to execute " . mysqli_error($con);
    }
    
    // Close connection
    mysqli_close($con);

}else{
    $post_arr = array(
        'Message' => 'Parameters are not correctly set!',
        'Response' => 'NACK'
    );
    print_r(json_encode($post_arr));
}


function success_msg($req, $mobile_mac, $mach_mac){
    echo json_encode(
      array(
          'Response' => 'ACK',
          'Mobile_MAC' => $mobile_mac,
          'Machine_MAC' => $mach_mac
      )
    );
  }

?>