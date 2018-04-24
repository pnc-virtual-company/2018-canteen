
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
    border-right:solid gray 2px;
	}

	.sidenav a {
	    padding: 6px 8px 6px 16px;
	    text-decoration: none;
	    font-size: 16px;
	    color: #818181;
	    display: block;
	}

	.sidenav a:hover {
	    color: #f1f1f1;
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
	    background-color:gray;
	    overflow-x: hidden;
	    padding-top: 20px;
	    border-left:solid green 2px;
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
	a:hover{
		text-decoration:none;
		color:green;
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




	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="sidenav">
				  <a href="#about"><i class="mdi mdi-rice"></i>&nbsp; Try foot</a>
				  <a href="#about"><i class="mdi mdi-rice"></i>&nbsp; Water food</a>
				  <a href="#about"><i class="mdi mdi-rice"></i>&nbsp;  Other</a>
				</div>
			</div>
		
			<div class="col-md-6">		
				  <br>
				  <i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i><span>&nbsp; Canteen Manage</span>
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi impedit non reprehenderit temporibus nostrum laborum deleniti, consectetur. Magnam earum asperiores harum eveniet rerum cupiditate, suscipit quibusdam iusto accusamus alias tenetur.</p>
				
				 <div class="card">
				    <!-- <div class="card-header">Header</div> -->
				    <div class="card-body">
				    	<img src="<?php echo base_url();  ?>assets/images/food/food1.jpg" alt="">
					<img src="<?php echo base_url();  ?>assets/images/food/food2.jpg" alt="">
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
				    	 <i style="margin-left:-10px; color:blue;" class="mdi mdi-account-circle">User</i><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat repudiandae laudantium pariatur consequatur officia incidunt, dolore architecto eaque, </p>
				    	 
				    	 <i style="margin-left:-10px; color:blue;" class="mdi mdi-account-circle">User</i><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat repudiandae laudantium pariatur consequatur officia incidunt, dolore architecto eaque, </p>

				    </div>
				    <div class="manage-comment">
				    	<i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i><span>&nbsp; Canteen Manage</span><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem corporis nihil, illo error eos suscipit placeat sed consequuntur aliquam,</p>
				 	
				    </div>
			</div>

			<div class="col-md-3">
				<div class="sidenav2">
					<ul>
						<li>
							<i style="margin-left:-30px;" class="mdi mdi-account-circle"></i> <span>&nbsp; User login now</span>
							
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
					</ul>
				</div>
			</div>
		</div>
	</div>



     
 