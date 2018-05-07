<style>
	.jumbotron{
		box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    background-color:#009688;
	}
</style>
<div class="app-content">
	  <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>Form to create new dish</h1>
            <p>This application is very useful for admin and finance to manage their needs.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/food/listDish"><span class="mdi mdi-arrow-left-bold-circle-outline" style="font-size: 20px;"></span>&nbsp;&nbsp;List of dishes</a></li>
        </ul>
  </div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" >
			<div class="jumbotron  text-white">
			<h2 class="text-center text-white">Add New Dish</h2>
	
			<form action="<?php echo base_url(); ?>admin/food/add_dish" enctype="multipart/form-data" method="POST">
				
			    <div class="form-group">
			      <label for="email">Dish Name:</label>
			      <input type="text" class="form-control" name="dishName" placeholder="Enter dish name " required >
			    </div>

			    <div class="form-group">
			      <label for="pwd">Dish Image:</label>
			      <input type="file" class="form-control" name="dishImage" required placeholder="Enter password">
			    </div>
			    <div class="form-group">
			      <label for="dishDescription">Dish Description:</label>
			      <textarea name="dishDescription" cols="30" rows="4" class="form-control"></textarea>
			    </div>
			    <br>
			    <button type="button" class="btn btn-danger float-left" onclick="goBack()">Cancel</button>
			    <button type="submit" class="btn btn-warning float-right" value="upload">Add Dish</button>
			</form>
		</div>
		</div>
		<div class="col-md-2"></div>
	 
<script>
	function goBack() {
  	window.history.back();
	}
</script>

