<?php declare(strict_types=1);

use Dmytrii\ClientLibrary\APIClient\APIClient;
use Dmytrii\ClientLibrary\APIClient\HttpMethods\HttpGetTripMethod;
use Dmytrii\ClientLibrary\APIClient\HttpMethods\HttpPostTripMethod;

require __DIR__ . '/../vendor/autoload.php';

$apiclient = new APIClient("https://kolobus.com.ua/api");
$result2 = $apiclient->sendRequest(HttpPostTripMethod::METHODNAME, [
    "from" => "d71d72ea-fed2-4f2b-8d5b-726362456b43",
    "to" => "a57a19ca-3624-4666-a87d-881cb3ceaa5b",
    "date" => "2022-01-01",
    "passengers" => 1
]);
print_r($result2->getContent());