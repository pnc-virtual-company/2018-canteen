
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-8" >
			<div class="jumbotron bg-info text-white">
			<h2 class="text-center text-white">Add New Dish</h2>
	
			<form action="<?php echo base_url(); ?>admin/food/add_dish" enctype="multipart/form-data" method="POST">
				
			    <div class="form-group">
			      <label for="email">Dish Name:</label>
			      <input type="text" class="form-control" name="dishName" placeholder="Enter dish name " required >
			    </div>
			    <div class="form-group">
			      <label for="pwd">Dish Date:</label>
			      <input type="date" class="form-control" name="dishDate" required placeholder="Choose add date">
			    </div>
			    <div class="form-group">
			      <label for="pwd">Dish Image:</label>
			      <input type="file" class="form-control" name="dishImage" required placeholder="Enter password">
			    </div>
			    <div class="form-group">
			      <label for="dishDescription">Dish Description:</label>
			      <!-- <input type="text" class="form-control" name="dishDescription" required placeholder="Enter dish's description"> -->
			      <textarea name="dishDescription" cols="30" rows="4" class="form-control"></textarea>
			    </div>
			    <br>
			    <button type="button" class="btn btn-danger float-left" onclick="goBack()">Cancel</button>
			    <button type="submit" class="btn btn-success float-right" value="upload">Add Dish</button>
			</form>
		</div>
		</div>
		<div class="col-md-1"></div>
	 
<script>
	function goBack() {
  	window.history.back();
	}
</script>

