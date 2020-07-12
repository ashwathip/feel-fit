<!DOCTYPE html>
<html>
<head>
	<title>Recipe</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<hr>
		<div class="text-center">
			<?php 
				require_once "vendor/autoload.php";
				$client 	= new MongoDB\Client;
				$dataBase 	= $client->selectDatabase('blog');
				$collection = $dataBase->selectCollection('articles');
				if(isset($_POST['create'])) {
					$data 		= [
						'title' 		=> $_POST['title'],
						'description' 	=> $_POST['description'],
						'author' 		=> $_POST['author'],
						'createdOn' 	=> new MongoDB\BSON\UTCDateTime
					];

					if($_FILES['file']) {
						if(move_uploaded_file($_FILES['file']['tmp_name'], 'upload/'.$_FILES['file']['name'])) {
							$data['fileName'] = $_FILES['file']['name'];
						} else {
							echo "Failed to upload file.";
						}
					}

					$result = $collection->insertOne($data);
					if($result->getInsertedCount()>0) {
						echo "Article is created..";
					} else {
						echo "Failed to create Article";
					}
				}
				if(isset($_GET['action']) && $_GET['action'] == 'delete') {
					
					$filter		= ['_id' => new MongoDB\BSON\ObjectId($_GET['aid'])];

					$article = $collection->findOne($filter);
					if(!$article) {
						echo "Article not found.";
					}

					$fileName = 'upload/'.$article['fileName'];
					if(file_exists($fileName)) {
						if(!unlink($fileName)) {
							echo "Failed to delete file."; exit;
						}
					}

					$result = $collection->deleteOne($filter);

					if($result->getDeletedCount()>0) {
						echo "Article is deleted..";
					} else {
						echo "Failed to delete Article";
					}

					
				}

			?>
		</div>
		<div class="row">
		    <div class="col-md-4">
			    

				
		    </div>
		    <div class="col-md-8">
		    	<!-- Show Articles -->
		    	<?php 
		    		$articles = $collection->find();
		    		foreach ($articles as $key => $article) {
		    			$UTCDateTime 	= new MongoDB\BSON\UTCDateTime((string)$article['createdOn']);
		    			$DateTime 		= $UTCDateTime->toDateTime();

		    			$data = json_encode( [
							'id' 			=> (string) $article['_id'],
							'title' 		=> $article['title'],
							'description' 	=> $article['description'],
							'author' 		=> $article['author']
						], true);

		    			echo '<div class="rows">
								<div class="col-md-12">'.$DateTime->format('d/m/Y H:i:s').'</div>
								<div class="rows">
									<div class="col-md-3"><img src="upload/'.$article['fileName'].'" width="180"></div>
									<div class="col-md-8">
										<strong>'.$article['title'].'</strong>
										<p>'.$article['description'].'</p>
										<p class="text-right">'.$article['author'].'</p>
									</div>';
						echo	"<div class='col-md-1'>
									<a href='uploadingfiles.php?action=delete&aid=".$article['_id']."'>Delete</a>
									</div>
								</div>
							</div>";
		    		}
		    	?>
		    </div>
		</div>
	</div>
</body>
</html>