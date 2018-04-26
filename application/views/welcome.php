
   <style>
   .sidenav {
    height: 100%;
    width: 200px;
    position: fixed;
    z-index: 1;
    top: 40px;
    left: 0;
    overflow-x: hidden;
    padding-top: 20px;
    border-right:solid #DBE9F4 0.5px;
    background-color: #009688;
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
	    font-size: 18px; /* Increased text to enable scrolling */
	}

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
	    padding-top: 20px;
	    border-left:solid #DBE9F4 0.5px;
	    background-color: #eceff1 ;
		}

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
		color:#FFA726;
	}
	
	img{
		width: 100%;
		margin:0 auto;
	
	}
	.item{
		border-right: solid gray 1px;
		border-left: solid gray 1px;
	}
.material-icons{
    display: inline-flex;
    vertical-align: top;
}
</style>




	<div class="container">
		<div class="row">
			<div class=" col-lg-2 col-md-3col-sm-6 col-xs-12 nav fixed">
				<div class="sidenav">
				  <a href="#about"><i class="mdi mdi-rice"></i>&nbsp; Dry Food</a>
				  <a href="#about"><i class="mdi mdi-rice"></i>&nbsp; Water Food</a>
				  <a href="#about"><i class="mdi mdi-rice"></i>&nbsp; Menu</a>
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
					    		<img src="<?php echo base_url();  ?>assets/images/food/food1.jpg" alt="">
					    	</div>
					    	<div class="col-md-6">
							<img src="<?php echo base_url();  ?>assets/images/food/food2.jpg" alt="">
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
						    		<a href="#" class="text-secondary"><i class="mdi mdi-rice text-info"></i>&nbsp; Order</a>
						    	</div>
						    	<div class="col-md-4 ">
						    		<a href="#" class="text-secondary"><i class="mdi mdi-comment text-info"></i>&nbsp; Recomment</a>
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



     
 