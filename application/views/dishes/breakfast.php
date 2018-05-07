<?php 
/**
     * display breakfast in the admin dashbaord
     * @author Chantha ROEURN <chantha.roeurn@student.passerellesnumeriques.org>
     */
 ?>
<style>
	.card{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
</style>

<!-- Stylel css for water_food -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/food_type.css">
<br>
	<div class="header text-center">
		<h1 class="text-info">Breakfast</h1>
	</div>
	<hr>
<div class="container">
	
		<div class="row">

			<div class="col-md-6 col-lg-2"></div>
			<?php foreach ($dishes as $breakfast) {
		?>
			
			<div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="card">
					<div class="card-body">
						<h4 style="text-align: center;"><?php echo $breakfast->dish_name ?></h4>
					<div class="thumbnail">
						<a href="<?php echo base_url();?>assets/dish_uploads/5.jpg" target="_blank">
						<img src="<?php echo base_url().'assets/dish_uploads/'.$breakfast->dish_image ?>" alt="Fjords" style="width:100% ;height : 200px;">
						<div class="overlay">
							<div class="text">Water food Description</div>
						</div>
						</a>
					</div>
					</div>
				</div><br>
			</div>
			<?php } ?>
		</div>	
	</div>

