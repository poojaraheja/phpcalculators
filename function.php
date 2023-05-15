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
    $message = "Hii " . $name . ", your BMI is: " . round($cal, 2) . ". You are " . $condition . "!";

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

    $err = curl_error($ch);



    curl_close($ch);


    if ($err) {
        echo "cURL Error #:" . $err;
    } else {

        return json_decode($response);


    }


}

function fat_cal($name, $mobile, $waist, $wrist, $hip, $forearm, $gender, $interested, $weight)
{
    if ($gender == 'female') {
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
    if ($gender == 'female') {

        $message = "Hii " . $name . ", Your Body Fat is: " . round($body_fat_per, 2) . ". You are " . $condition . "!";



    } elseif ($gender == 'male') {
        $message = "Hii " . $name . ", Your Body Fat is: " . round($men_body_fat_percentage, 2) . ". You are " . $condition . "!";



    }
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
    $err = curl_error($ch);



    curl_close($ch);


    if ($err) {
        echo "cURL Error #:" . $err;
    } else {

        return json_decode($response);


    }
}


function bmr_cal($name, $mobile, $email, $weight, $height, $inches, $age, $gender, $interested)
{
    $cal_height = intval($height) * 12 + intval($inches);
    $height_cm = ($cal_height * 2.5);

    if ($gender == "female") {
        $bmr_female = 655 + (9.6 * $weight) + (1.8 * $height_cm) - (4.7 * $age);

    } elseif ($gender == "male") {
        $bmr_male = 66 + (13.7 * $weight) + (5 * $height_cm) - (6.8 * $age);
    }
    if ($gender == "female") {
        $message = "Hii " . $name . ", Your BMR Value is: " . round($bmr_female, 2) . " !";

    } elseif ($gender == "male") {
        $message = "Hii " . $name . ",  Your BMR Value is: " . round($bmr_male, 2) . " !";
    }
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
    $err = curl_error($ch);



    curl_close($ch);


    if ($err) {
        echo "cURL Error #:" . $err;
    } else {

        return json_decode($response);


    }



}

function calorie($name, $mobile, $email, $weight, $height, $inches, $age, $gender, $diet, $exe_time, $activity, $medications, $interested)
{
    $cal_height = intval($height) * 12 + intval($inches);
    $height_cm = ($cal_height * 2.5);
    if ($gender == "female") {
        $bmr = 655 + (9.6 * $weight) + (1.8 * $height_cm) - (4.7 * $age);
    } elseif ($gender == 'male') {
        $bmr = 66 + (13.7 * $weight) + (5 * $height_cm) - (6.8 * $age);
    }
    if ($activity == "sedentary") {
        $calorie_cal = $bmr * 12;
    } elseif ($activity == "lightly") {
        $calorie_cal = $bmr * 1.375;
    } elseif ($activity == "moderately") {
        $calorie_cal = $bmr * 1.55;

    } elseif ($activity == "veryactive") {
        $calorie_cal = $bmr * 1.725;
    } elseif ($activity == "extraactive") {
        $calorie_cal = $bmr * 1.9;
    }

}


function water($name, $mobile, $email, $weight, $age, $exe_time, $interested)
{
    $f1 = $weight * 0.44;
    $f2 = ($exe_time / 30) * 0.355;
    $result = $f1 + $f2;
    $message = "Hii " . $name . ",  Your Water Level Value is: " . round($result, 2) . "";
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

    $err = curl_error($ch);



    curl_close($ch);


    if ($err) {
        echo "cURL Error #:" . $err;
    } else {

        return json_decode($response);


    }
}

function waist_to_hip($name, $mobile, $email, $waist, $hip, $interested, $gender)
{
    $wth = $waist / $hip;
    if ($gender == "male") {
        if ($wth <= 0.95) {
            $condition = "Low Risk";
        } elseif ($wth > 0.96 && $wth < 1.0) {
            $condition = "Moderate Risk";
        } elseif ($wth > 1.0) {
            $condition = "High Risk";
        }
    } elseif ($gender == "female") {
        if ($wth <= 0.80) {
            $condition = "Low Risk";
        } elseif ($wth > 0.81 && $wth < 0.85) {
            $condition = "Moderate Risk";
        } elseif ($wth > 0.85) {
            $condition = "High Risk";
        }
    }
    $message = "Hii " . $name . ",  Your Waist To Hip Ratio Value is: " . round($wth, 2) . ". You have " . $condition . "";
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
    $err = curl_error($ch);



    curl_close($ch);


    if ($err) {
        echo "cURL Error #:" . $err;
    } else {

        return json_decode($response);


    }

}
?>