<style>
label{
	font-weight: bold;
}
</style>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1>Update Dishes</h1>
			<p>All best food in Passerelles Numeriques Cambodai canteen</p>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/food/listDish"><span class="mdi mdi-arrow-left-bold-circle" style="font-size: 20px;"></span>&nbsp;&nbsp;Back</a></li>
		</ul>
	</div>
	<div class="card">
		<div class="card-body bg-info">
			<div class="card-header  text-center">
				<h3>Update Dishes</h3>
			</div>
			<!-- loop data to show for update -->
		 <?php foreach ($select_dishes as $dish):?>
			<form action="<?php echo base_url() ?>admin/food/updateDishes/<?php echo  $dish->dish_id?>" method="POST" enctype="multipart/form-data" >
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-4">
						<div class="form-group">
							<label >Dish Name</label>
							<input type="text" class="form-control" name="dishName" value="<?php echo $dish->dish_name; ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label >Dish Date</label>
							<input type="date" class="form-control" name="dishDate" value="<?php echo $dish->dish_date; ?>">
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>

				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-4">
						<div class="form-group ">
							<label >Description</label>
							<input type="text" class="form-control" name="description"  value="<?php echo $dish->description; ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label >Dish Image</label>
							<input type="file" class="form-control" name="dishImage" value="<?php echo $dish->dish_image; ?>">
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>

				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-4">
						<button type="submit" class="btn btn-danger">Cancel</button>
					</div>
					<div class="col-md-4">
						<button type="submit" class="btn btn-primary">Update Now</button>
					</div>
				</div>
				<?php endforeach ?>  
			</form> 
		</div>
	</div>
</main>