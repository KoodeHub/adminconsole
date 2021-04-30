# Admin Console
    . A simple project demonstrating the use of REST API and MySQL CRUD operations.

## Description:
    1. This app is a basic console having three tabs:
        . Home:
            . Has a REST API tile from OpenweatherMap.org which gives detail about the temperature.
            . Has REST API list from twitter with OAUTH 1.0 authentication.
        . User:
            . Has a registration form to register new users to the system.
        . Vendor
            . Has a form to input Vendor name and feature to search individual vendor and all vendors.

## Technology Stack
    . PHP
    . HTML
    . CSS
    . MySQL 


### Steps to get OAUTH tokens for twitter API
 
    .   Take the following URL https://api.twitter.com/oauth/request_token
    .  select method as GET
    .  Click Send in Postman
    .   This would give you the values of parameters
    .   OAuth oauth_consumer_key
    .   oauth_token
    .   oauth_timestamp
    .   oauth_nonce
    .   oauth_version
    .   oauth_signature
    .   oauth_signature_method

    #### One you get these parameter values generate the string in the following format by passing respective values.
    .   oauth_consumer_key=YOUR_VALUE&oauth_nonce=YOUR_VALUE&oauth_signature=YOUR_VALUE&oauth_signature_method=HMAC-SHA1&oauth_timestamp=YOUR_VALUE&oauth_token=YOUR_VALUE&oauth_version=1.0

### Steps to get API keys from weather API
    . Login to developer portal using OpenweatherMap.org
    . register and use the free API.
    . API-key would be sent to your email.
    
### Home page
![Screen Shot 2021-04-30 at 11 33 03 AM](https://user-images.githubusercontent.com/71738571/116718630-2aa52d00-a9a8-11eb-9b1e-e0a771d07772.png)

