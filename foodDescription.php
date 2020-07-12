<?php

$caloriefood = $_POST["caloriefood"];
require 'vendor/autoload.php';

$client=new MongoDB\Client;
$fooddb=$client->fooddb;
$foodcol=$fooddb->foodcol;

$var1 = $foodcol->find(["calories"=>"$caloriefood"]);

// foreach($var1 as $var2)
// {
//     var_dump($var2);
// }

// ?>
   
 
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
<body class="container pb-5 big-banner">
  <section class="col-6">
      <h4 class="mt-2 pb-2 text-body">Food Description</h4>    
      <?php foreach($var1 as $var2){?>
      <ul class="list-group">
        <li class="list-group-item" style="font-size:20px"><h4 >FOOD NAME</h4><br/><?php echo $var2["foodname"]?></li>
        <li class="list-group-item" style="font-size:20px"><h4 >CALORIES</h4><br/><?php echo $var2["calories"]?></li>
        <li class="list-group-item" style="font-size:20px"><h4 >INGREDIENTS</h4><br/><?php echo $var2["ingredients"]?></li>
        <li class="list-group-item" style="font-size:20px"><h4 >INSTRUCTIONS</h4><br/><?php echo $var2["instrutions"] ?></li>
      </ul>
      <?php } ?>
  </section>
</body>
</html>