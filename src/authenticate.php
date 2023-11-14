<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once('../vendor/autoload.php');
$secret_Key  = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';

$date   = new DateTimeImmutable();
$expire_at     = $date->modify('+6 minutes')->getTimestamp();      // Add 60 seconds
$domainName = "your.domain.name";
$username   = "pramod";
$uid = '123';

// Retrieved from filtered POST data
$request_data = [
    'iat'  => $date->getTimestamp(),         // Issued at: time when the token was generated
    'iss'  => $domainName,                       // Issuer
    'nbf'  => $date->getTimestamp(),         // Not before
    'exp'  => $expire_at,                           // Expire
    'userName' => $username,                     // User name
    'uid' => $uid
];


$jwt =  JWT::encode(
    $request_data,
    $secret_Key,
    'HS512'
);

$token = JWT::decode($jwt, new Key($secret_Key,'HS512'));
echo "<br><br>";
print_r($token);
die;


?>

//user
//blog - user id


login endpoint
get blog - pass token i header and then based on id return blog
