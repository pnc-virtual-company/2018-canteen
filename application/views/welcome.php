		<!--Datepicker widget needs its CSS and JS files to work //-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/css/bootstrap-datepicker.min.css">
		<script src="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/left_menu.css">
		<dsiv class="row">
			<div class="col-md-2"></div>
			<div class="col-lg-8 col-md-6  col-sm-6 col-xs-12">		
				  <br>
				  <i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i><span>&nbsp; Canteen Manager</span>
				<?php 	foreach ($dishesOrder as $dish) {    ?>
				  	<p><?php echo $dish->menu_description ?></p>
				  <?php } ?>
				  <div class="row">
				   <?php foreach ($dishesOrder as $dish) {    ?>	
					<div class="col-md-6">	
				 <div class="card card-columns">
				    <!-- <div class="card-header">Header</div> -->
				   
				    <div class="card-body">
				    	<div class="row">				    		
					    	<div class="col-md-6 text-center">
					    		<img src="<?php echo base_url().'assets/dish_uploads/'.$dish->dish_image?>" alt="" style="width: 400px; height: 300px;">
					    	</div>							    	
					</div><br>	
				    </div> 
				    
				    <div class="card-footer">
				    	<div class="container">
				    		<div class="row">
				    			 <?php if($this->session->loggedIn === TRUE) { ?>
				    			<div class="col-md-4">
				    				<a href="#" class="text-secondary">45&nbsp; <i class="mdi mdi-thumb-up text-info"></i>&nbsp; Interest</a>
				    			</div>
				    			
						    	<div class="col-md-4 item" id="food">
						    		 <a href="javascript:void()" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" 
                      						><i class="mdi mdi-rice text-info"></i>&nbsp;Order</a>
                       						  
						    	</div>
						    	
						    	<div class="col-md-4">
						    		<a href="#" class="text-secondary" id="recomment"><i class="mdi mdi-comment text-info"></i>&nbsp; Recomment</a>
						    	</div>
						    	<?php } ?>
				    		</div>
				    	</div>
				    	
				    </div>
				  
				 </div>	
				 <div class="user-comment" style="margin-left: 80px;">
				    	 <i style="margin-left:-10px; color:blue;" class="mdi mdi-account-circle">Khai Hok</i><p>I think this food look interest and I want to order this kind of food to be cook for the following day, I want to see this food to be cooked. </p>
				    	 
				    	 <i style="margin-left:-10px; color:blue;" class="mdi mdi-account-circle">Canteen Manager</i><p>Yes thank you , I will drop this food to daily menu to be cook.</p>

				    </div>	
					</div>
					  <?php } ?>
				  </div>
				   
				   
			</div>
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
							           <img src="<?php echo  base_url().'assets/dish_uploads/'.$dish->dish_image?>" alt="image" class="img-thumbnail mx-auto d-block " >
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
	});
</script>

     
 