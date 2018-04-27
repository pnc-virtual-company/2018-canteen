
   <style>
   .sidenav {
    height: 100%;
    /*width: 200px;*/
    position: fixed;
    z-index: 1;
    top: 40px;
    left: 0;
    overflow-x: hidden;
    padding-top: 80px;
    border-right:solid #DBE9F4 0.5px;
    background-color: #0d47a1 ;
 }

 .sidenav a {
     padding: 6px 8px 6px 16px;
     text-decoration: none;
     font-size: 16px;
     color: #fff;
     display: block;
 }

 .sidenav a:hover {
     color: blue;
 }

 .main {
     font-size: 18px; / Increased text to enable scrolling /
 }

<<<<<<< HEAD
	/*sidena2*/
	 .sidenav2 {
	    height: 100%;
	    width: 200px;
	    position: fixed;
	    z-index: 1;
	    top: 40px;
	    right: 0;
	    color: black;
	    overflow-x: hidden;
	   padding-top: 80px;
	    border-left:solid #DBE9F4 0.5px;
	    background-color: #eceff1 ;
		}
=======
 /*sidena2*/
  .sidenav2 {
     height: 100%;
   /*  width: 200px;*/
     position: fixed;
     z-index: 1;
     top: 40px;
     right: 0;
     color: black;
     overflow-x: hidden;
     padding-top: 20px;
     border-left:solid #DBE9F4 0.5px;
     background-color: #eceff1 ;
  }
>>>>>>> 2c5f5a0972b1e27d6772cb0ccedfd90fb5b2a0df

 .sidenav2 a {
     padding: 6px 8px 6px 16px;
     text-decoration: none;
     font-size: 14px;
     color: purple;
     display: block;
 }

 .sidenav2 a:hover {
     color: #f1f1f1;
 }
 li{
  text-decoration:none;
  list-style-type: none;
 }
 .row a:hover {
  text-decoration:none;
  color:blue;
 }
 
 img{
  width: 249px;
  height: 200px;
  float: left;
  padding: 10px;
 }
.material-icons{
    display: inline-flex;
    vertical-align: top;
}
</style>
<<<<<<< HEAD
<script src="<?php echo base_url();?>assets/js/bootbox-4.4.0.min.js"></script>
	<div class="container">
		<div class="row">
			<div class=" col-lg-2 col-md-3col-sm-6 col-xs-12 nav fixed">
				<div class="sidenav">
				  <a href="#"><i class="mdi mdi-rice"></i>&nbsp; Dry Food</a>
				  <a href="#"><i class="mdi mdi-rice"></i>&nbsp; Water Food</a>
				  <a href="<?php echo base_url() ?>dishes/menu"><i class="mdi mdi-rice"></i>&nbsp; Menu</a>
				</div>
			</div>
		
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
				    			<div class="col-md-4">
				    				<a href="#" class="text-secondary">45&nbsp; <i class="mdi mdi-thumb-up text-info"></i>&nbsp; Interest</a>
				    			</div>
				    			 <?php if($this->session->loggedIn === TRUE) { ?>
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
 <?php if($this->session->loggedIn === TRUE) { ?>
			<div class="col-md-2 col-lg-3 col-sm-6 col-xs-12">
				<div class="sidenav2">
					<ul>
						<li>
							<i style="margin-left:-30px;" class="mdi mdi-account-multiple text-info"></i> <span class="text-info">&nbsp; Users Active</span>
							
						</li>
						<li>
							 <a href=""><i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Davy</span></a>
						</li>
						<li>
							 <a href=""><i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Chantha</span></a>
						</li>
						<li>
							 <a href=""><i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Khai</span></a>
						</li>
						<li>
							 <a href=""><i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Kemseong</span></a>
						</li>
					</ul>
				</div>
			</div>
			<?php } ?>
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

     
 
=======




 <div class="container">
  <div class="row">
   <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12 nav fixed">
    <div class="sidenav">
      <a href="#about"><i class="mdi mdi-rice"></i>&nbsp; Try foot</a>
      <a href="#about"><i class="mdi mdi-rice"></i>&nbsp; Water food</a>
      <a href="#about"><i class="mdi mdi-rice"></i>&nbsp;  Other</a>
    </div>
   </div>
  
   <div class="col-lg-6 col-md-6  col-sm-6 col-xs-12">  
      <br>
      <i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i><span>&nbsp; Canteen Owner</span>
      <p>Hello everyone today I have a nice food for all of you, hurry up come and help to buy our food, I have listed two kind of Humbergers. If you like or unlike please don't herritage to leave the comment. I am waiting for your feedback.</p>
    
     <div class="card">
        <!-- <div class="card-header">Header</div> -->
        <div class="card-body">
         <img src="<?php echo base_url();  ?>assets/images/food-wallpaper-high-quality-For-Desktop-Wallpaper.jpg" alt="">
     <img src="<?php echo base_url();  ?>assets/images/fast-food.jpg" alt="">
        </div> 
        <div class="card-footer">
         <div class="container">
          <div class="row">
           <div class="col-md-4"><a href="#" class="text-secondary"><i class="mdi mdi-thumb-up"></i>&nbsp; Interest</a></div>
           <div class="col-md-4"><a href="#" class="text-secondary"><i class="mdi mdi-rice"></i>&nbsp; Order</a></div>
           <div class="col-md-4"><a href="#" class="text-secondary"><i class="mdi mdi-comment"></i>&nbsp; Recomment</a></div>
          </div>
         </div>
         
        </div>
     </div>
     <br>
       <div class="user-comment" style="margin-left: 80px;">
          <i style="margin-left:-10px; color:blue;" class="mdi mdi-account-circle">Kimseong Kao</i><p>I don't like kind of these foods. </p>
          
          <i style="margin-left:-10px; color:blue;" class="mdi mdi-account-circle">Canteen Owner</i><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat repudiandae laudantium pariatur consequatur officia incidunt, dolore architecto eaque, </p>

        </div>
        <div class="manage-comment">
         <i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i><span>&nbsp; Canteen Owner</span><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem corporis nihil, illo error eos suscipit placeat sed consequuntur aliquam,</p>
      
        </div>
   </div>

   <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
    <div class="sidenav2">
     <ul>
      <li>
       <i style="margin-left:-30px;" class="mdi mdi-account-multiple"></i> <span>&nbsp; User login now</span>
       
      </li>
      <li>
        <i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Davy</span>
      </li>
      <li>
        <i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Chantha</span>
      </li>
      <li>
        <i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Khai</span>
      </li>
      <li>
        <i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Kemseong</span>
      </li>
      <li>
        <i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Sun</span>
      </li>
     </ul>
    </div>
   </div>
  </div>
 </div>
>>>>>>> 2c5f5a0972b1e27d6772cb0ccedfd90fb5b2a0df
