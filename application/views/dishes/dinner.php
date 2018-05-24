<?php 
/**
     * display dinner in admin dashboard
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
<main class="app-content">
		<div class="app-title">
		<div>
			<h1>List All Dinner</h1>
			<p>All best food in Passerelles Numeriques Cambodai canteen</p>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url() ?>Dishes"><span class="mdi mdi-arrow-left-bold-circle" style="font-size: 20px;"></span>&nbsp;&nbsp;Back To Welcome Board</a></li>
		</ul>
	</div>
		<div class="row">
			<?php foreach ($dishes as $breakfast) {
		?>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="card">
					<div class="card-body">
						<h4 style="text-align: center;"><?php echo $breakfast->dish_name ?></h4>
					<div class="thumbnail">
						<a href="<?php echo base_url().'assets/images/dish_uploads/'.$breakfast->dish_image ?>" target="_blank">
						<img src="<?php echo base_url().'assets/images/dish_uploads/'.$breakfast->dish_image ?>" alt="Fjords" style="width:100% ;height : 200px;">
						<div class="overlay">
							<div class="text"><?php echo $breakfast->description ?></div>
						</div>
						</a>
					</div>
					</div>
				</div><br>
			</div>
			<?php } ?>
		</div>	
	</main>

