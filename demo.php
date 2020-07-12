<?php
require 'vendor/autoload.php';

$client=new MongoDB\Client;

$companydata=$client->companydata;

$result=$companydata->createCollection('empCollection');
var_dump($result)

?>
