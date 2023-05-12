<?php

function bmi_cal($name, $mobile, $email, $weight, $height, $inches)
{

    // $condition = "";
    $cal_height = intval($height) * 12 + intval($inches);
    $height_cm = ($cal_height * 2.5);
    $height_m = $height_cm / 100;

    $cal = intval($weight) / pow($height_m, 2);
    if ($cal <= 18.5) {
        $condition = "Underweight";

    } else if ($cal > 18.5 && $cal <= 24.9) {
        $condition = "Normal";

    } else if ($cal > 25 && $cal <= 29.9) {
        $condition = "OverWeight";

    } else if ($cal > 30) {
        $condition = "Obese";
    } else {
        $condition = "none";
    }
    // $message = "hello {$name}";
    $message = "Hii " . $name . ", your BMI is: " . $cal . ". You are " . $condition . "!";

    $ch = curl_init();
    // $url = 'https://fullstackmtech.com/api/send.php';
    $url = "https://fullstackmtech.com/api/send.php?number=91" . $mobile . "&type=text&message=" . urlencode($message) . "&instance_id=644FF20D6602A&access_token=e5eb155cecb6a89011cb8568e1135663";

    // $data = array(
    //     'number'       => '91' . $mobile,
    //     'type'         => 'text',
    //     'message'      => $message,
    //     'instance_id'  => '644FF20D6602A',
    //     'access_token' => 'e5eb155cecb6a89011cb8568e1135663'

    // );







    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_POST, 1);

    // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);




    $response = curl_exec($ch);




    curl_close($ch);




    return $response;



}
?>