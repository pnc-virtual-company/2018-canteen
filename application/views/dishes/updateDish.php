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
			<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/food/listDish"><span class="mdi mdi-arrow-left-bold-circle" style="font-size: 20px;"></span>&nbsp;&nbsp;Back</a></li>
		</ul>
	</div>
	<div class="card">
		<div class="card-body bg-info">
				<?php foreach ($select_dishes as $dish) { ?>
			<form action="<?php echo base_url() ?>admin/food/updateDishes/<?php echo  $dish->dish_id?>" method="POST" >
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label >Dish Name</label>
							<input type="text" class="form-control" name="dishName" value="<?php echo $dish->dish_name; ?>">
						</div>
						<div class="form-group">
							<label >Dish Date</label>
							<input type="Date()" class="form-control" name="dishDate" value="<?php echo $dish->dish_date; ?>">
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>

				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group ">
							<label >Description</label>
							<input type="text" class="form-control" name="description"  value="<?php echo $dish->description; ?>">
						</div>
						<div class="form-group">
							<label >Dish Image</label>
							<input type="file" class="form-control" name="dishImage" value="<?php echo $dish->dish_image; ?>">
						</div>
						<button type="submit" class="btn btn-primary">Update Now</button>
					</div>
					<div class="col-md-2"></div>
				</div>
				<?php } ?>
			</form> 
		</div>
		
	</div>
	
</main>
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
								<label class="text-white" >Dish Image</label>
								<input type="file" class="form-control" name="dishImage" value="<?php echo $dish->dish_image; ?>">
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
							<button type="button" class="btn btn-danger float-left" onclick="goBack()"><span class="mdi mdi-cancel"></span>&nbsp;&nbsp;Cancel</button>
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
<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/css/bootstrap-datepicker.min.css">
  
  <script src="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('.datepicker').datepicker({
    orientation:"bottom",
    todayBtn: true,
    todayHighlight: true,
    autoclose:true,
  });
});
  function goBack() {
    window.history.back();
  }

</script>
