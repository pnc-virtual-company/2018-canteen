<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>


  
<div class="container">

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-8" >
			<div class="jumbotron">
			<h2 class="text-center text-success">Add New Dish</h2>
	
			<form action="<?php echo base_url();?>addDish/insert_dish" enctype="multipart/form-data" method="POST">
			
		<!-- 	<?php //echo form_open_multipart('addDish/insert_dish');?>  -->
				
			    <div class="form-group">
			      <label for="email">Dish Name:</label>
			      <input type="text" class="form-control" name="dishname" placeholder="Enter dish name " required >
			    </div>

			    <div class="form-group">
			      <label for="pwd">Dish Image:</label>
			      <input type="file" class="form-control" name="imagename" required placeholder="Enter password">
			    </div>

			    <div class="form-group">
<<<<<<< HEAD
			      <label for="pwd">Dish Description:</label>
			      <input type="text" class="form-control" name="dishdescription" required placeholder="Enter dish's description">
=======
			      <label for="pwd">Dish Image:</label>
			      <input type="file" class="form-control" name="dishImage" required placeholder="Enter password">
			       <!-- show error message when upload image -->
			      <p><?php echo $error_msg ?></p> 
>>>>>>> 36f31af8406cb2ac2b6cea6b7b6e7e273ab089d8
			    </div>

			    <div class="form-group">
			      <label for="pwd">Dish Date:</label>
			      <input type="date" class="form-control" name="dishdate" required placeholder="Choose add date">
			    </div>
<<<<<<< HEAD
			    
			    <div class="form-group">
			      <label for="dishDescription">Dish time</label><br>
			      	<select name="plate" class="form-control" id="recipient-name" >
						<?php 
							$type  = array("Breakfast","Lunch","Dinner");
							         	foreach ($type as  $value) {
							           		echo "<option>".$value."</option>";
							           			}
							           	?>
				</select>	
			    </div>
=======
>>>>>>> 36f31af8406cb2ac2b6cea6b7b6e7e273ab089d8
			    <br>
			    <button type="submit" class="btn btn-danger float-left">Cancel</button>
			    <button type="submit" class="btn btn-success float-right" value="upload">Add Dish</button>
			</form>
		</div>
		</div>
		<div class="col-md-1"></div>
	 
