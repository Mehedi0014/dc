<?php

$ip = $_SERVER['REMOTE_ADDR'];
$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (strpos($link, '404.php') == false) {
//$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $date = date('Y-m-d H:i:s');
    
    
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
    $result  = array('country'=>'', 'city'=>'');
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    } 
//    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
//    if($ip_data && $ip_data->geoplugin_countryName != null){
//        $result['country'] = $ip_data->geoplugin_countryName;
//        $result['city'] = $ip_data->geoplugin_city;
//    }
//    $country = $result['country'];
//    $city = $result['city'];  
    
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=" . $ip);

    $result = curl_exec($ch);

    curl_close($ch);
    $ip_data = json_decode($result, true);

    $country = $ip_data['geoplugin_countryName'];
    $city = $ip_data['geoplugin_city'];

    $qry_ins_ip = "INSERT INTO ip_track(ip, link, country, city, date_visited"
            . " ) VALUES('$ip', '$link', '$country', '$city', '$date')";
    $res1 = mysqli_query($con, $qry_ins_ip) or trigger_error("Query Failed! SQL: $qry_ins_ip - Error: " . mysqli_error($con), E_USER_ERROR);

    if ($row_setting['total_visited'] == 0) {
        $qry_upd_cnt1 = "UPDATE `setting` SET `total_visited`= '1'";
        $res_upd_cnt1 = mysqli_query($con, $qry_upd_cnt1) or trigger_error("Query Failed! SQL: $qry_upd_cnt1 - Error: " . mysqli_error(), E_USER_ERROR);
    } else {
        $count_visited = $row_setting['total_visited'];
        $count_visited = $count_visited + 1;
        $qry_upd_cnt2 = "UPDATE `setting` SET `total_visited`= '$count_visited'";
        $res_upd_cnt2 = mysqli_query($con, $qry_upd_cnt2) or trigger_error("Query Failed! SQL: $qry_upd_cnt2 - Error: " . mysqli_error(), E_USER_ERROR);
        
    }
}

