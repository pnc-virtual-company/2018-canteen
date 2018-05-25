
<style>
label{
	font-weight: bold;
}
.card-body{
	background-color: #009688 ;
}
</style>

<main class="app-content">
	<div class="app-title">
		<div>
			<h1>Update Dishes</h1>
			<p>All best food in Passerelles Numeriques Cambodai canteen</p>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/food/listDish"><span class="mdi mdi-arrow-left-bold-circle" style="font-size: 20px;"></span>&nbsp;&nbsp;Back to list dishes</a></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
			<div class="col-md-8 card-body">
					<h2 class="text-white text-center">Update Dishes</h2>
				<!-- loop data to show for update -->
			 <?php foreach ($select_dishes as $dish):?>
				<form action="<?php echo base_url() ?>admin/food/updateDishes/<?php echo  $dish->dish_id?>" method="POST" enctype="multipart/form-data" >
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label class="text-white">Dish Name</label>
								<input type="text" class="form-control" name="dishName" value="<?php echo $dish->dish_name; ?>">
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label class="text-white">Description</label>
								<textarea type="text" class="form-control" name="description"><?php echo $dish->description;?></textarea> 
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label class="text-white">Meal Time</label>
								  <select class="form-control" name="mealTime" multiple="multiple">
								    <?php foreach ($mealTime as $meal): ?>
								      <option value="<?php echo $meal->time_id ?>" <?php if ($meal->time_id == $dish->meal_time_id) echo "selected" ?>><?php echo $meal->name ?></option>
								    <?php endforeach ?>
								  </select>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label class="text-white" >Dish Image</label>
								<input type="file" class="form-control" name="dishImage" value="<?php echo $dish->dish_image; ?>">
									<p><?php echo $error_message ?></p>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<a href="<?php echo base_url(); ?>admin/food/listDish" class="btn btn-danger float-left"><span class="mdi mdi-cancel"></span>&nbsp;&nbsp;Cancel</a>
							<button type="submit" class="btn btn-warning float-right"><span class="mdi mdi-pencil" >&nbsp;&nbsp;Update Now</button>
						</div>
						<div class="col-md-2"></div>
					</div>
					<?php endforeach ?>  
				</form> 
			</div>
	</div>
	
	</div>
</main>