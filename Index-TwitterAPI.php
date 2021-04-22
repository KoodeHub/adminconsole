<?php
/* 
1. Use the URL in postman with the string 
passed under Authorization header.
2. Once you receive a response, select code and copy the PHP Code from POSTMAN.
3. paste the corresponding code here under php tags.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.twitter.com/1.1/search/tweets.json?q=FreeRangehumans',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: OAuth oauth_consumer_key="REPLACEWITHNEWKEY",oauth_token="REPLACEWITHNEWKEY",oauth_signature_method="HMAC-SHA1",oauth_timestamp="1619124541",oauth_nonce="REPLACEWITHNEWKEY",oauth_version="1.0",oauth_signature="REPLACEWITHNEWKEY"',
    'Cookie: guest_id=REPLACEWITHNEWKEY; personalization_id="REPLACEWITHNEWKEY"; lang=en'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

//echo var_dump($response);
//var_dump(json_decode($response,"true"));
$twitter_output=json_decode($response,"true");

?>
