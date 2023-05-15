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

function fat_cal($name, $mobile, $waist, $wrist, $weight, $hip, $forearm, $gender, $interested)
{
    if ($gender == 'women') {
        $body_weight = (intval($weight * 0.732)) + 9.987;
        $wrist_measure = intval($wrist) / 3.140;
        $waist_measure = intval($waist) * 0.157;
        $hip_measure = intval($hip) * 0.249;
        $forearm_measure = intval($forearm) * 0.434;
        $lean_body_mass_factor = $body_weight + $wrist_measure - $waist_measure - $hip_measure + $forearm_measure;
        $body_fat_weight = $weight - $lean_body_mass_factor;
        $body_fat_per = ($body_fat_weight * 100) / $weight;
        if ($body_fat_per > 10 && $body_fat_per < 12) {
            $condition = "Essential Fat";
        } elseif ($body_fat_per > 14 && $body_fat_per < 20) {
            $condition = "Athletes";

        } elseif ($body_fat_per > 21 && $body_fat_per < 24) {
            $condition = "Fitness";

        } elseif ($body_fat_per > 25 && $body_fat_per < 31) {
            $condition = "Acceptable";

        } elseif ($body_fat_per > 32) {
            $condition = "Obese";
        }


    } elseif ($gender == 'male') {
        $men_weight = ($weight * 1.082) + 94.42;
        $men_waist = $waist * 4.15;
        $men_lean_body_mass_factor = $men_weight - $men_waist;
        $men_body_fat_weight = $weight = $men_lean_body_mass_factor;
        $men_body_fat_percentage = ($men_body_fat_weight * 100) / $weight;
        if ($men_body_fat_percentage > 2 && $men_body_fat_percentage < 4) {
            $condition = "Essential Fat";
        } elseif ($men_body_fat_percentage > 6 && $men_body_fat_percentage < 13) {
            $condition = "Athletes";

        } elseif ($men_body_fat_percentage > 14 && $men_body_fat_percentage < 17) {
            $condition = "Fitness";

        } elseif ($men_body_fat_percentage > 18 && $men_body_fat_percentage < 25) {
            $condition = "Acceptable";

        } elseif ($men_body_fat_percentage > 25) {
            $condition = "Obese";
        }





    }
    if ($gender == 'women') {

        $message = "Hii " . $name . ", your BMI is: " . $body_fat_per . ". You are " . $condition . "!";

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

    } elseif ($gender == ' men') {

    }
}

?>