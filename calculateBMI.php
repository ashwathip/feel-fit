<?php

$BMI;
$name=$_POST["name"];
$weight=$_POST["weight"];
$height=$_POST["height"];

require 'vendor/autoload.php';

$client=new MongoDB\Client;
$bmidb=$client->bmidb;
$bmicollection=$bmidb->bmicollection;


if(isset($_POST['calculate'])){
  if (!isset($_POST['weight'])) {
    return 'Please enter your weight';
    exit();
  }
  if (!isset($_POST['height'])) {
    return 'Please enter your height';
    exit();
  }
}

$insertOneResult=$bmicollection->insertOne(
['name'=>$name,'weight'=>$weight,'height'=>$height]
);


// $weight = filter_var(htmlentities(floatval($_POST['weight'])),FILTER_SANITIZE_NUMBER_FLOAT);
// $height = filter_var(htmlentities(floatval($_POST['height'])),FILTER_SANITIZE_NUMBER_FLOAT);

// function calculateBMI($weight, $height){
//   return pow($weight / ($height / 100), 2);
// }
$a=$height/100;
$b=$a*$a;
$c=$weight/$b;

$insertOnebmi=$bmicollection->insertOne(
  ['bmi'=>$c]
  );
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="custom-style.css"/>
    <title>Document</title>
</head>
<body class="container pt-5 pb-5 big-banner">
  <h1 class="text-center text-light text-light "><?php echo $name?>  your BMI: <?php echo $c?></h1>
  </body>
  </html>
  