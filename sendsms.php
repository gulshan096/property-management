<?php

//Your authentication key
$authKey = "374063AfHDqRpMg6225d2f1P1";

//Multiple mobiles numbers separated by comma
$mobileNumber = "+918251090001";

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "MECHSU";

//Your message to send, Add URL encoding here.
$message = urlencode("8598 is your OTP for Mobile Number Verification from Mechanics4u Automobiles Private Limited. Please don't share it with anyone.");

//Define route 
$route = 4;
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey, 
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'DLT_TE_ID' => 1307165097331644342,
    'route' => $route
);

//API URL
$url="https://control.msg91.com/sendhttp.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

echo $output;
?>