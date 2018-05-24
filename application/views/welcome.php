
<!--Datepicker widget needs its CSS and JS files to work //-->
<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/css/bootstrap-datepicker.min.css">
<script src="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/left_menu.css">
<style>
	.Uninterest{
		display: none;
	}
</style>
<br><br>
<div class="row">
	<div class="col-lg-2 col-md-0 col-sm-0 col-xs-0"></div>
	<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
		<?php foreach($dishesOrder as $menu){ ?>
		<h2 style="color: #009688;">Breakfast</h2>
		<strong><hr style="box-shadow: 1px 1px 1px;"></strong>		
		<i class="mdi mdi-account-circle text-danger" style="font-size:18px"></i>&nbsp;<strong style="color: #009688; font-size: 17px;">Canteen Manager</strong> <span>| <?php  echo $menu->menu_created_date; ?></span>
		<p><?php echo $menu->menu_description; ?> </p>
		<?php break;}?>
		<div class="row">
			<?php foreach($dishesOrder as $dish) {    ?>	
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">	
				<div class="card card-columns">
					<div class="card-body">			    		
							<img src="<?php echo base_url().'assets/images/dish_uploads/'.$dish->dish_image?>" class="img-responsive" data-toggle="tooltip" data-placement="bottom" title="<?php echo $dish->dish_name ?>">			    	
					</div> 
					<div class="card-footer">
						<div class="container">
							<div class="row">
								<?php if($this->session->loggedIn === TRUE) { ?>
								<div class="col-md-4 Interest">
				    				<a class="interest" href="#" name="view" value=view" id="<?php echo $dish->dish_id;?>"><?php echo $dish->current_interest; ?>&nbsp; <i class="mdi mdi-thumb-up "></i>&nbsp; Interest</a>
				    			</div>
				    			<div class="col-md-4 Uninterest">
				    				<a class="uninterest" href="#" name="view" style='color:orange;'value="view" id="<?php echo $dish->dish_id?>"><?php echo $dish->current_interest; ?>&nbsp; <i class="mdi mdi-thumb-down "></i>&nbsp; Interest</a>
				    			</div>			    			
								<div class="col-md-4 item" id="food">
									<a href="#" name="view" value="view" id="<?php echo $dish->dish_id?>" class="view_data"><i class="mdi mdi-rice"></i>Order</a>	
								</div>			    					    	
								<div class="col-md-4">
									<a href="#" id="recomment"><i class="mdi mdi-comment"></i>&nbsp; Recommend</a>
								</div>
								<?php } ?>
							</div>
						</div>				    	
					</div>				  				 
				</div>					 
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- <br><br>
<div class="row">
	<div class="col-lg-2 col-md-0 col-sm-0 col-xs-0"></div>
	<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
		<?php foreach($dishesOrder1 as $menu){ ?>
		<h2 style="color: #009688;">Lunch</h2>
		<strong><hr style="box-shadow: 1px 1px 1px;"></strong>		
		<i  style="font-size:18px" class="mdi mdi-account-circle text-danger"></i>&nbsp;<strong style="color: #009688; font-size: 17px;">Canteen Manager</strong> <span>| <?php  echo $menu->menu_created_date; ?></span>
		<p><?php echo $menu->menu_description; ?> </p>
		<?php break;}?>
		<div class="row">
			<?php foreach($dishesOrder1 as $dish) {    ?>	
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">	
					<div class="card card-columns">
						<div class="card-body">			    		
								<img src="<?php echo base_url().'assets/images/dish_uploads/'.$dish->dish_image?>" class="img-responsive" data-toggle="tooltip" data-placement="bottom" title="<?php echo $dish->dish_name ?>">			    	
						</div> 
						<div class="card-footer">
							<div class="container">
								<div class="row">
									<?php if($this->session->loggedIn === TRUE) { ?>
									<div class="col-md-4 Interest">
				    				<a class="interest" href="#" name="view" value=view" id="<?php echo $dish->dish_id;?>"><?php echo $dish->current_interest; ?>&nbsp; <i class="mdi mdi-thumb-up "></i>&nbsp; Interest</a>
				    			</div>
				    			<div class="col-md-4 Uninterest">
				    				<a class="uninterest" href="#" name="view" style='color: orange;'value="view" id="<?php echo $dish->dish_id?>"><?php echo $dish->current_interest; ?>&nbsp; <i class="mdi mdi-thumb-down "></i>&nbsp; Interest</a>
				    			</div>					    			
									<div class="col-md-4 item" id="food">
										<a href="#" name="view" value="view" id="<?php echo $dish->dish_id?>" class="view_data"><i class="mdi mdi-rice"></i>Order</a>	
									</div>			    					    	
									<div class="col-md-4">
										<a href="#" id="recomment"><i class="mdi mdi-comment"></i>&nbsp; Recommend</a>
									</div>
									<?php } ?>
								</div>
							</div>				    	
						</div>				  				 
					</div>					 
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<br><br>
<div class="row">
		<div class="col-lg-2 col-md-0 col-sm-0 col-xs-0"></div>
		<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
		<?php foreach($dishesOrder2 as $menu){ ?>
		<h2 style="color: #009688;">Dinner</h2>
		<strong><hr style="box-shadow: 1px 1px 1px;"></strong>		
		<i style="font-size:18px" class="mdi mdi-account-circle text-danger"></i>&nbsp;<strong style="color: #009688; font-size: 17px;">Canteen Manager</strong> <span>| <?php  echo $menu->menu_created_date; ?></span>
		<p><?php echo $menu->menu_description; ?> </p>
		<?php break;}?>
		<div class="row">
			<?php foreach($dishesOrder2 as $dish) {    ?>	
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">	
						<div class="card card-columns">
							<div class="card-body">			    		
									<img src="<?php echo base_url().'assets/images/dish_uploads/'.$dish->dish_image?>" class="img-responsive" data-toggle="tooltip" data-placement="bottom" title="<?php echo $dish->dish_name ?>">			    	
							</div> 
							<div class="card-footer">
								<div class="container">
										<div class="row">
											<?php if($this->session->loggedIn === TRUE) { ?>
											<div class="col-md-4 Interest">
					    				    <a class="interest" href="#" name="view" value=view" id="<?php echo $dish->dish_id;?>"><?php echo $dish->current_interest; ?>&nbsp; <i class="mdi mdi-thumb-up "></i>&nbsp; Interest</a>
				    			        </div>
						    			<div class="col-md-4 Uninterest">
						    				<a class="uninterest" href="#" name="view" style='color: orange;'value="view" id="<?php echo $dish->dish_id?>"><?php echo $dish->current_interest; ?>&nbsp; <i class="mdi mdi-thumb-down "></i>&nbsp; Interest</a>
						    			</div>					    			
										<div class="col-md-4 item" id="food">
											<a href="#" name="view" value="view" id="<?php echo $dish->dish_id?>" class="view_data"><i class="mdi mdi-rice"></i>Order</a>	
										</div>			    					    	
										<div class="col-md-4">
											<a href="#" id="recomment"><i class="mdi mdi-comment"></i>&nbsp; Recommend</a>
										</div>
										<?php } ?>
									</div>
								</div>				    	
							</div>				  				 
						</div>					 
					</div>
			<?php } ?>
		</div>
	</div>
</div> -->
<!-- create modal of order item -->
<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Please Leave your order information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="data">
			</div>
		</div>
	</div>
	<!-- End of modal creation -->
	<script>
		$(document).ready(function(){  
			$('.view_data').click(function(){  
				var dish_id = $(this).attr("id");  
				$.ajax({  
					url:"<?php echo base_url() ?>Welcome/getDish",  
					method:"post",  
					data:{dish_id:dish_id},  
					success:function(data){ 
						$("#data").html(data);
						$('#dataModal').modal("show");
						$('.view_data').text("Edit Order");
					}  
				});  
			});

			$('#btn-order').click(function(){
				if ($data != NULL) {
					$('.view_data').text("Edit Order");
				}
			});

			$('.interest').click(function(){
	        	var dish_id = $(this).attr("id");
	        	$('.Interest').hide();
		        $('.Uninterest').show();  
				$.ajax({  
					url:"<?php echo base_url() ?>admin/food/storeInterest",  
					method:"post",  
					data:{dish_id:dish_id},  
					success:function(data){ 
						// $("#data").html(data);
						// $('#dataModal').modal("show");
						// $('.view_data').text("Edit Order");
					}  
				});  
            });
  
         $('.uninterest').click(function(){
           var dish_id = $(this).attr("id");
	        	$('.Interest').show();
		        $('.Uninterest').hide();  
				$.ajax({  
					url:"<?php echo base_url() ?>admin/food/storeUninterest",  
					method:"post",  
					data:{dish_id:dish_id},  
					success:function(data){ 
						// $("#data").html(data);
						// $('#dataModal').modal("show");
						// $('.view_data').text("Edit Order");
					}  
				});  
         }); 
	});  
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
	</script>

