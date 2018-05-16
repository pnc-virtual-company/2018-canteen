
		<!--Datepicker widget needs its CSS and JS files to work //-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/css/bootstrap-datepicker.min.css">
		<script src="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/left_menu.css">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-lg-8 col-md-6  col-sm-6 col-xs-12">		
				  <br>
				  <i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i><span>&nbsp; Canteen Manager</span>
				<p>This is the food that I will cook tommorrow so everyone can order now </p>
				  <div class="row">
				   <?php foreach ($dishesOrder as $dish) {    ?>	
			<div class="col-md-6">	
				 <div class="card card-columns">
				    <!-- <div class="card-header">Header</div> -->
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
						    		 <a href="#" name="view" value="view" id="<?php echo $dish->dish_id?>" class=" view_data"><i class="mdi mdi-rice "></i>Order</a>	
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
				   <div class="user-comment">
					 	<img src="<?php echo base_url() ?>assets/images/coming-soon.png" alt="" style="width:80%">   
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
           $.ajax({  
                url:"<?php echo base_url() ?>Welcome/getDish",  
                method:"post",  
                data:{dish_id:dish_id},  
                success:function(data){ 
                $("#data").html(data);
           			$('#dataModal').modal("show");
                }  
           });  
      });  
 });  
</script>

     
 