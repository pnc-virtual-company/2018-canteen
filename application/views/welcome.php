
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
					      <i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i>&nbsp;<strong style="color: #009688; font-size: 17px;">Canteen Manager</strong> <span>| <?php  echo $menu['menu_created_date'] ?></span>
					    <p><?php echo $menu['menu_description'] ?> </p>
					<?php break;}?>
				  <div class="row">
				  	<div class="container">  
					</div>
				  <?php 
				   if(count($dishesOrder) > 0){ // check if no food or not 
				   foreach ($dishesOrder as $dish) {    ?>	
			<div class="col-md-6">	
				 <div class="card card-columns">
				    <!-- <div class="card-header">Header</div> -->
				    <div class="card-body">
				    	<div class="row">				    		
					    	<div class="col-md-6 text-center">
					    		<img src="<?php echo base_url().'assets/images/dish_uploads/'.$dish['dish_image']; ?>" alt="" style="width: 400px; height: 300pxs;">
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
						    		 <?php if($dish['is_user_order'] == false){ ?>
						    		 	<a href="javascript:void()" name="view" value="view" id="<?php echo $dish['dish_id']; ?>" button-status="btn_order" class="view_data"><i class="mdi mdi-rice"></i>Order</a>	
						    		 <?php }else{ ?>
						    		 	<a href="javascript:void()" name="view" value="view" id="<?php echo $dish['dish_id']; ?>" button-status="btn_edit_order" class="view_data"><i class="mdi mdi-pencil"></i>Edit Order</a>	
                   					<?php } ?>
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
				   <?php 
						}
				   }else{ // No food.

				   	echo "<i>No food for Breakfast!</i>";
				   } ?>
				 </div>
				   <div class="user-comment">
					 	<!-- <img src="<?php echo base_url() ?>assets/images/coming-soon.png" alt="" style="width:80%">    -->
				   </div>
			</div>
		</div>
		<!-- Lunch part -->
		<br />
		<br />
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-lg-8 col-md-6  col-sm-6 col-xs-12">		
				  
				  <div class="row">
				  	<div class="container">
					  <div class="page-header">
					     <?php foreach($dishesOrder1 as $menu){ ?>
					    <h2 style="color: #009688;">Lunch</h2>
					    <strong><hr style="box-shadow: 1px 1px 1px;"></strong>  
					      <i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i>&nbsp;<strong style="color: #009688; font-size: 17px;">Canteen Manager</strong> <span>| <?php  echo $menu['menu_created_date'] ?></span>
					    <p><?php echo $menu['menu_description'] ?> </p>
					<?php break;}?>   
					  </div>    
					</div>
				    <?php 
				   if(count($dishesOrder1) > 0){ // check if no food or not 
				   foreach ($dishesOrder1 as $dish) {    ?>	
			<div class="col-md-6">	
				 <div class="card card-columns">
				    <!-- <div class="card-header">Header</div> -->
				    <div class="card-body">
				    	<div class="row">				    		
					    	<div class="col-md-6 text-center">
					    		<img src="<?php echo base_url().'assets/images/dish_uploads/'.$dish['dish_image']; ?>" alt="" style="width: 400px; height: 300pxs;">
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
						    		 <?php if($dish['is_user_order'] == false){ ?>
						    		 	<a href="javascript:void()" name="view" value="view" id="<?php echo $dish['dish_id']; ?>" button-status="btn_order" class="view_data"><i class="mdi mdi-rice"></i>Order</a>	
						    		 <?php }else{ ?>
						    		 	<a href="javascript:void()" name="view" value="view" id="<?php echo $dish['dish_id']; ?>" button-status="btn_edit_order" class="view_data"><i class="mdi mdi-pencil"></i>Edit Order</a>	
                   					<?php } ?>
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
				   <?php 
						}
				   }else{ // No food.

				   	echo "<i>No food for Lunch!</i>";
				   } ?>
				 </div>
				   <div class="user-comment">
					 	<!-- <img src="<?php echo base_url() ?>assets/images/coming-soon.png" alt="" style="width:80%">    -->
				   </div>
			</div>
		</div>
		<!-- Dinner part -->
		<br />
		<br />
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-lg-8 col-md-6  col-sm-6 col-xs-12">		
				  <?php foreach($dishesOrder2 as $menu){ ?>
					    <h2 style="color: #009688;">Dinner</h2>
					    <strong><hr style="box-shadow: 1px 1px 1px;"></strong>  
					      <i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i>&nbsp;<strong style="color: #009688; font-size: 17px;">Canteen Manager</strong> <span>| <?php  echo $menu['menu_created_date'] ?></span>
					    <p><?php echo $menu['menu_description'] ?> </p>
					<?php break;}?>
				  <div class="row">
				  	<div class="container">   
					</div>
				   <?php 
				   if(count($dishesOrder2) > 0){ // check if no food or not 
				   foreach ($dishesOrder2 as $dish) {    ?>	
			<div class="col-md-6">	
				 <div class="card card-columns">
				    <!-- <div class="card-header">Header</div> -->
				    <div class="card-body">
				    	<div class="row">				    		
					    	<div class="col-md-6 text-center">
					    		<img src="<?php echo base_url().'assets/images/dish_uploads/'.$dish['dish_image']; ?>" alt="" style="width: 400px; height: 300pxs;">
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
						    		 <?php if($dish['is_user_order'] == false){ ?>
						    		 	<a href="javascript:void()" name="view" value="view" id="<?php echo $dish['dish_id']; ?>" button-status="btn_order" class="view_data"><i class="mdi mdi-rice"></i>Order</a>	
						    		 <?php }else{ ?>
						    		 	<a href="javascript:void()" name="view" value="view" id="<?php echo $dish['dish_id']; ?>" button-status="btn_edit_order" class="view_data"><i class="mdi mdi-pencil"></i>Edit Order</a>	
                   					<?php } ?>
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
				   <?php 
						}
				   }else{ // No food.

				   	echo "<i>No food for Dinner!</i>";
				   } ?>
				 </div>
				   <div class="user-comment">
					 	<!-- <img src="<?php echo base_url() ?>assets/images/coming-soon.png" alt="" style="width:80%">    -->
				   </div>
			</div>
		</div>

		</div>
	</div>
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
           // get button status to show form order or edit order
           var btn_status = $(this).attr('button-status');

           $.ajax({  
                url:"<?php echo base_url() ?>Welcome/getDish",  
                method:"post",  
                data:{dish_id:dish_id, status_form: btn_status},  
                success:function(data){ 
                $("#data").html(data);
           			$('#dataModal').modal("show");
			//$('.view_data').text("Edit Order");
                }  
           });  
      });

        $('#btn-order').click(function(){
	           			if ($data != NULL) {
						  //    	$('.view_data').text("Edit Order");
	           			}
		});
 });  
</script>

     
 