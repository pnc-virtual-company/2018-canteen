<!-- Author Chantha ROEURN -->
<!-- View dish detail interface  -->
<style>
	.container{
		background-image: url(" <?php echo base_url();?>assets/images/dish_background.jpg");
		background-repeat: no-repeat;
		background-size: cover;
		height: auto;
		width:100%;
		margin-left: 15%;
	}
</style>
<div class="container">
	<br>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-5">
			<?php foreach ($dishes as $dish)?>
			<div class=" card bg-white">
				 <img src="<?php echo base_url().'assets/dish_uploads/'.$dish->dish_image ?>" alt="image" class="img-thumbnail mx-auto d-block " style="width: 300px;">
				<div class="description">
					<h3 class="text-center text-success"><?php echo $dish->dish_name ?></h3>
					<h4 class="text-justify"><small><?php echo $dish->description  ?>	</small></h4>
					<h4>	<small>	Date:<?php echo $dish->dish_date; ?></small></h4>
			<?php endforeach ?>
				</div>
			</div>	 
		</div>
	</div>	
</div>