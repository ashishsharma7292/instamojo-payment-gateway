<?php
session_start();
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_5cdb53b4c878ecc11d93e812345",
                  "X-Auth-Token:test_239fb755861839c3c4725512345"));
$payload = Array(
    'purpose' => 'For testing',
    'amount' => '10',
    'phone' => '9999999999',
    'buyer_name' => 'Ashish Sharma',
    'redirect_url' => 'http://www.lucknow.com/responce.php',
    'send_email' => true,
    'send_sms' => true,
    'email' => 'test@gmail.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
$response = json_decode($response);
$_SESSION['TID']= $response->payment_request->id;
header('Location:'.$response->payment_request->longurl);
?>
