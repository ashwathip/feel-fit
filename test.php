<?php

$food = $_POST["food"];


require 'vendor/autoload.php';

$client=new MongoDB\Client;
$fooddata=$client->fooddata;
$foodvalue=$fooddata->foodvalue;
$foodcollection=$fooddata->foodcollection;

$insertOneResult=$foodvalue->insertOne(
['food'=>$food]
);

// printf("Inserted %d documents", $insertOneResult->getInsertedCount());
// var_dump($insertOneResult->getInsertedId());

// $var1 = $foodcollection->find()
// foreach($var1 as $var1){

// }

 $details = $foodcollection->find(
     ["name" => "$food"]
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
    <title>Food Recipe</title>
</head>
<body class="big-banner">
<section class="col-6">
      <h2 class="mt-2 pb-2 text-light">THE FOOD NUTRITION VALUE</h2>    
      <?php foreach($details as $details1){?>
      <ul class="list-group">
        <li class="list-group-item" style="font-size:20px"><h4 class="">FOOD NAME</h4><br/><?php echo $details1["name"]?></li>
        <li class="list-group-item" style="font-size:20px"><h4 class="">CALORIES</h4><br/><?php echo $details1["calorie"]?></li>
        <li class="list-group-item" style="font-size:20px"><h4 class="">PROTIEN</h4><br/><?php echo $details1["protien"]?></li>
        <li class="list-group-item" style="font-size:20px"><h4 class="">FAT</h4><br/><?php echo $details1["fat"] ?></li>
      </ul>
  </section>
<?php } ?>
</table>
</body>
</html>
