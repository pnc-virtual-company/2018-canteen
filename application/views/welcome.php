
		<!--Datepicker widget needs its CSS and JS files to work //-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/css/bootstrap-datepicker.min.css">
		<script src="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/left_menu.css">
    	<br><br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-lg-8 col-md-6  col-sm-6 col-xs-12">
				<?php foreach($dishesOrder as $menu){ ?>
				<h2 style="color: #009688;">Breakfast</h2>
				<strong><hr style="box-shadow: 1px 1px 1px;"></strong>		
				  <i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i>&nbsp;<strong style="color: #009688; font-size: 17px;">Canteen Manager</strong> <span>| <?php  echo $menu->menu_created_date; ?></span>
				<p><?php echo $menu->menu_description; ?> </p>
					<?php break;}?>
				  <div class="row">
				   <?php foreach($dishesOrder as $dish) {    ?>	
			<div class="col-md-6">	
				 <div class="card card-columns">
				    <div class="card-body">
				    	<div class="row">				    		
					    	<div class="col-md-6 text-center">
					    		<img src="<?php echo base_url().'assets/images/dish_uploads/'.$dish->dish_image?>" alt="" style="width: 400px; height: 300px;">
					    	</div>							    	
					</div><br>				    	
				    </div> 
				    <div class="card-footer">
				    	<div class="container">
				    		<div class="row">
				    			 <?php if($this->session->loggedIn === TRUE) { ?>
				    			<div class="col-md-4">
				    				<a href="#" >45&nbsp; <i class="mdi mdi-thumb-up "></i>&nbsp; Interest</a>
				    			</div>				    			
						    	<div class="col-md-4 item" id="food">
						    		 <a href="javascript:void()" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" 
						    		 food_img="<?php echo base_url().'assets/images/dish_uploads/'.$dish->dish_image ?>" 
                      							><i class="mdi mdi-rice text-info show_food_img"></i>&nbsp;Order</a>			
                      						</div>			    					    	
						    	<div class="col-md-4">
						    		<a href="#" id="recomment"><i class="mdi mdi-comment  "></i>&nbsp; Recomment</a>
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
				<div class="col-md-2"></div>
				<div class="col-lg-8 col-md-6  col-sm-6 col-xs-12">
					<?php foreach($dishesOrder1 as $menu){ ?>
					<h2 style="color: #009688;">Lunch</h2>
					<strong><hr style="box-shadow: 1px 1px 1px;"></strong>		
					  <i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i>&nbsp;<strong style="color: #009688; font-size: 17px;">Canteen Manager</strong> <span>| <?php  echo $menu->menu_created_date; ?></span>
					<p><?php echo $menu->menu_description; ?> </p>
						<?php break;}?>
					  <div class="row">
					   <?php foreach($dishesOrder1 as $dish) {    ?>	
				<div class="col-md-6">	
					 <div class="card card-columns">
					    <div class="card-body">
					    	<div class="row">				    		
						    	<div class="col-md-6 text-center">
						    		<img src="<?php echo base_url().'assets/images/dish_uploads/'.$dish->dish_image?>" alt="" style="width: 400px; height: 300px;">
						    	</div>							    	
						</div><br>				    	
					    </div> 
					    <div class="card-footer">
					    	<div class="container">
					    		<div class="row">
					    			 <?php if($this->session->loggedIn === TRUE) { ?>
					    			<div class="col-md-4">
					    				<a href="#" >45&nbsp; <i class="mdi mdi-thumb-up "></i>&nbsp; Interest</a>
					    			</div>				    			
							    	<div class="col-md-4 item" id="food">
							    		 <a href="javascript:void()" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" 
							    		 food_img="<?php echo base_url().'assets/images/dish_uploads/'.$dish->dish_image ?>" 
	                      							><i class="mdi mdi-rice text-info show_food_img"></i>&nbsp;Order</a>
	                      						</div>			 
							    	<div class="col-md-4">
							    		<a href="#" id="recomment"><i class="mdi mdi-comment  "></i>&nbsp; Recomment</a>
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
				<div class="col-md-2"></div>
				<div class="col-lg-8 col-md-6  col-sm-6 col-xs-12">
					<?php foreach($dishesOrder2 as $menu){ ?>
					<h2 style="color: #009688;">Dinner</h2>
					<strong><hr style="box-shadow: 1px 1px 1px;"></strong>		
					  <i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i>&nbsp;<strong style="color: #009688; font-size: 17px;">Canteen Manager</strong> <span>| <?php  echo $menu->menu_created_date; ?></span>
					<p><?php echo $menu->menu_description; ?> </p>
						<?php break;}?>
					  <div class="row">
					   <?php foreach($dishesOrder2 as $dish) {    ?>	
				<div class="col-md-6">	
					 <div class="card card-columns">
					    <div class="card-body">
					    	<div class="row">				    		
						    	<div class="col-md-6 text-center">
						    		<img src="<?php echo base_url().'assets/images/dish_uploads/'.$dish->dish_image?>" alt="" style="width: 400px; height: 300px;">
						    	</div>							    	
						</div><br>				    	
					    </div> 
					    <div class="card-footer">
					    	<div class="container">
					    		<div class="row">
					    			 <?php if($this->session->loggedIn === TRUE) { ?>
					    			<div class="col-md-4">
					    				<a href="#" >45&nbsp; <i class="mdi mdi-thumb-up "></i>&nbsp; Interest</a>
					    			</div>				    			
							    	<div class="col-md-4 item" id="food">
							    		 <a href="javascript:void()" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" 
							    		 food_img="<?php echo base_url().'assets/images/dish_uploads/'.$dish->dish_image ?>" 
	                      							><i class="mdi mdi-rice text-info show_food_img"></i>&nbsp;Order</a>			
	                      						</div>			    					    	
							    	<div class="col-md-4">
							    		<a href="#" id="recomment"><i class="mdi mdi-comment  "></i>&nbsp; Recomment</a>
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
	<!-- create modal of order item -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Please Leave your order information</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				       <form action="<?php echo base_url() ?>admin/food/addOrder" method="post">			        
				        	<div class="row">
				        		<div class="col-6">
				        			<div class="form-group">				        			
							          	<label for="recipient-name" class="col-form-label"><?php echo $dish->dish_name ?></label>
							           <img src="" alt="image" class="img-thumbnail mx-auto d-block pop_food_img " >
						          </div>		        			
				        		</div>
				        		<div class="col-6">
				        			<div class="form-group">
							          	
							          	<label for="recipient-name" class="col-form-label">Quantity</label>
							          	<input type="hidden" name="fo_id[]" value="<?php echo $dish->dish_id?>" />

							           	<select name="plate[]" class="form-control" id="recipient-name" >
							           			<?php 
							           				$plate  = array(0,1,2,3,4,5,6,7,8,9,10);
							           			foreach ($plate as  $value) {
							           				echo "<option value='".$value."'>".$value."</option>";
							           				}
							           			?>
							           </select>	
							</div>
						</div>							 	     	
					</div>				        					        	
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				        <button type="submit" class="btn btn-success">Order Now</button>
				      </div>
				  </form>
				      
				    </div>
				  </div>
				</div>
			
	<!-- End of modal creation -->

<script>
	$(function() {
		var comment = "";
	   $('#recomment').click(function() {
	   	bootbox.prompt({
	   	    title: " ",
	   	    inputType: 'textarea',
	   	    placeholder: 'Leave your recomment here...',
	   	    buttons: {
	   	        confirm: {
	   	            label: 'Comment',
	   	            className: 'btn-success'
	   	        },
	   	        cancel: {
	   	            label: 'Cancel',
	   	            className: 'btn-danger'
	   	        }
	   	    },
	   	    callback: function (result) {
	   	       return result;
	   	    }
	   	});
	  });
	   $('.datepicker').datepicker({
	     orientation:"bottom",
	     todayBtn: true,
	     todayHighlight: true,
	     autoclose:true,
	   });

	     $('#food').on('click', '.show_food_img', function(e){
        // => Get the value of current attribute on the its link clicked
        var food_img = $(this).attr('user_img'
        // => After get the value then let set it into popup
          $('.pop_food_img').attr('src', food_img);
    });
	});
</script>