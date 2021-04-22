<?php
$api_key = '5448ee4cc6e3bbd47a80f2e2845b437b';
$city = 'Toronto';
$api_url = 'api.openweathermap.org/data/2.5/weather?q='.$city.'&appid='.$api_key;
//print_r($api_url);

/*
$context = stream_context_create(['http' => [
    'ignore_errors' => true,
]]);
$weather_data = file_get_contents($api_url, false, $context);
//$weather_data = file_get_contents($api_url);
print_r(var_dump($weather_data));
//$weather_data = json_decode(file_get_contents($api_url,true));
//print_r("XXXXHello");
if ($weather_data !== null) {
    echo "<pre>";
    print_r($weather_data);
 } else {
    echo "Unknown";
    print_r(var_dump($weather_data));
 }
print_r("Hello");
*/

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $api_url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$response = json_decode($response, true); //because of true, it's in an array
echo "<pre>";
$temperate_in_kelvin = $response['main']['temp'];
$temperature_in_celcius = round($temperate_in_kelvin - 273.15);
$current_weather = $response['weather']['0']['main'];
$current_weather_description = $response['weather']['0']['description'];
$current_weather_icon = $response['weather']['0']['icon'];
//print_r($response);
//print_r($temperature_in_celcius);
//print_r($current_weather);
//print_r($current_weather_description);
//print_r($current_weather_icon);
//print_r($city);
?>
