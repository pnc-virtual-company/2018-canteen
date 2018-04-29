<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/left_menu.css">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-lg-8 col-md-6  col-sm-6 col-xs-12">		
				  <br>
				  <i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i><span>&nbsp; Canteen Manage</span>
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi impedit non reprehenderit temporibus nostrum laborum deleniti, consectetur. Magnam earum asperiores harum eveniet rerum cupiditate, suscipit quibusdam iusto accusamus alias tenetur.</p>
				
				 <div class="card">
				    <!-- <div class="card-header">Header</div> -->
				    <div class="card-body">
				    	<div class="row">
					    	<div class="col-md-6 text-center">
					    		<img src="<?php echo base_url();?>assets/images/food/food1.jpg" alt="">
					    	</div>
					    	<div class="col-md-6">
							<img src="<?php echo base_url();?>assets/images/food/food2.jpg" alt="">
						</div>
					</div>
				    </div> 
				    <div class="card-footer">
				    	<div class="container">
				    		<div class="row">
				    			 <?php if($this->session->loggedIn === TRUE) { ?>
				    			<div class="col-md-4">
				    				<a href="#" class="text-secondary">45&nbsp; <i class="mdi mdi-thumb-up text-info"></i>&nbsp; Interest</a>
				    			</div>
						    	<div class="col-md-4 item">
						    		<a data-toggle="modal" data-target="#exampleModal" 
						    		data-whatever="@getbootstrap"><i class="mdi mdi-rice text-info"></i>&nbsp;Order</a>
						    	</div>
						    	<div class="col-md-4">
						    		<a href="#" class="text-secondary" id="recomment"><i class="mdi mdi-comment text-info"></i>&nbsp; Recomment</a>
						    	</div>
						    	<?php } ?>
				    		</div>
				    	</div>
				    	
				    </div>
				 </div>
				 <br>
				   <div class="user-comment" style="margin-left: 80px;">
				    	 <i style="margin-left:-10px; color:blue;" class="mdi mdi-account-circle">User</i><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat repudiandae laudantium pariatur consequatur officia incidunt, dolore architecto eaque, </p>
				    	 
				    	 <i style="margin-left:-10px; color:blue;" class="mdi mdi-account-circle">User</i><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat repudiandae laudantium pariatur consequatur officia incidunt, dolore architecto eaque, </p>

				    </div>
				    <div class="manage-comment">
				    	<i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i><span>&nbsp; Canteen Manage</span><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem corporis nihil, illo error eos suscipit placeat sed consequuntur aliquam,</p>
				 	
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
		        <form>
		          <div class="form-group">
		            <label for="recipient-name" class="col-form-label">Start Date:</label>
		            <input type="date" class="form-control" id="recipient-name"  >
		          </div>
		           <div class="form-group">
		            <label for="recipient-name" class="col-form-label">End date:</label>
		            <input type="date" class="form-control" id="recipient-name" >
		          </div> 
		           <div class="form-group">
		            <label for="recipient-name" class="col-form-label">Food Time:</label>
		           <select name="foodTime" class="form-control" id="recipient-name" >
		           	<?php 
		           		$foodTimes  = array('---Select One---','Breakfast', 'Lunch ', 'Dinner');
		           	foreach ($foodTimes as  $value) {
		           		echo "<option>".$value."</option>";
		           		}
		           	?>
		           </select>	
		          </div>
		           <div class="form-group">
		            <label for="recipient-name" class="col-form-label">Plate:</label>
		           <select name="plate" class="form-control" id="recipient-name" >
		           	<?php 
		           		$plates  = array('---Select plate---','1', '2', '3 ', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24' ,'25');
		           	foreach ($plates as  $value) {
		           		echo "<option>".$value."</option>";
		           		}
		           	?>
		           </select>	
		          </div>
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		        <button type="button" class="btn btn-success" data-dismiss="modal">Order Now</button>
		      </div>
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
	   	       comment = result;
	   	       return result;
	   	       alert(comment);
	   	    }
	   	});
	  });
	});
</script>

     
 