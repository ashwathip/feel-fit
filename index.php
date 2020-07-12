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
    <script src="../js/jquery-3.2.1.min.js"></script>
    <title>FEEL_FIT</title>
</head>
<body class="container pb-5 big-banner text-body ">
<h1 class="topic mt-5 mb-4 text-center">FEEL FIT</h1>
<section class="col-6">
    <h4 class="mt-2 pb-2">BMI CALCULATOR</h4>
    <form action="calculateBMI.php" method="post">
    <div  class="form-group ">
            <label for="Name">ENTER YOUR NAME</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="name" name="name">
        </div>
                <div class="form-group">
            <label for="weight">Enter WEIGHT</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Weight in kg" name="weight">
        </div>
        <div class="form-group">
            <label for="weight">Enter HEIGHT</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="height in cm" name="height">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
</section>
<section class="col-6">
    <h4 class="mt-2 pb-2 text-light">TO KNOW THE FOOD CALORIE</h4>
    <form action="test.php" method="post">
        <div class="form-group">
            <label for="food">ENTER THE FOOD NAME</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="food" name="food">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
</section>
<section class="col-6">
    <h4 class="mt-2 pb-2 text-light">TO KNOW THE FOOD FOR CALORIE</h4>
    <form action="foodDescription.php" method="post">
        <div class="form-group">
            <label for="">ENTER CALORIE VALUE</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="caloriefood" name="caloriefood">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
</section>
<form action="uploadingfiles.php" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					<fieldset>
						<!-- Form Name -->
						<legend style="margin-top: 5px; padding-top: 0;">Recipie Details</legend>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-12" for="title">Title</label>  
						  <div class="col-md-12">
						  <input id="title" name="title" type="text" placeholder="" class="form-control input-md">
						  </div>
						</div>

						<!-- Text Area-->
						<div class="form-group">
						  <label class="col-md-12" for="description">Description</label>  
						  <div class="col-md-12">
						  <textarea id="description" name="description" placeholder="" class="form-control" rows="6"></textarea>
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-12" for="author">Author</label>  
						  <div class="col-md-12">
						  <input id="author" name="author" type="text" placeholder="" class="form-control input-md">
						  </div>
						</div>

						<!-- File input-->
						<div class="form-group" id="fileInput">
						  <label class="col-md-12" for="file">Select Image</label>  
						  <div class="col-md-12">
						  <input id="file" name="file" type="file" placeholder="" class="form-control input-md">
						  </div>
						</div>

						<!-- Hidden article id -->
						<input type="hidden" name="aid" id="aid">

						<button id="create" name="create" class="btn btn-primary">Create Recipie</button>
						<button id="update" style="display: none;" name="update" class="btn btn-primary">Update Recipie</button>

					</fieldset>
				</form>
<body> 
