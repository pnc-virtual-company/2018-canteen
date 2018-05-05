  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/left_menu.css">
 <?php if($this->session->loggedIn === TRUE) { ?>
			<div class="col-md-2 col-lg-3 col-sm-6 col-xs-12">
				<div class="sidenav2">
					<ul>
						<li>
							
							<i style="margin-left:-30px;" class="mdi mdi-account-multiple text-info"></i> <span class="text-info">&nbsp; Users Active</span>
						</li>
						<?php foreach ($user as $value) {?>

						<li>
							
		                    <img src="<?php echo base_url().'assets/uploads/'.$value->image ?>" alt="image" class="rounded-circle " style="width:40px; height: 40px;"><span>&nbsp; <?php echo $value->firstname." ".$value->lastname; ?></span>
		                   
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<?php } ?>