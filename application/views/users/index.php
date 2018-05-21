<?php
/**
 * This view displays the list of users.
 * @copyright  Copyright (c) 2017-2018 Khai hok
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
 */
?>
<style>
	.card{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	a:hover {
		text-decoration: none;
		color:#007bff;
	}
</style>
<div class="app-content">
	  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Canteen Management System</h1>
          <p>This application is used to manage the dishes and the events.</p>
        </div>
  </div>
    <div class="row">
      <div class="col-md-12">
				<h1 class="text-center text-secondary">Welcome To Canteen Management System</h1><br><br>		
      	<div class="row">
      		<div class="col-md-4">
      			<a href="<?php echo	base_url() ?>admin/food/showBreakfast">
			      	<div class="card card-info">
			      		<div class="card-body  bg-info text-center">
			      				<i class="mdi mdi-coffee mdi-48px text-danger"></i>
			      		</div>
			      		<div class="card-footer text-center">
			      			<div class="card-text"><h4>Breakfast</h4></div>
			      		</div>
			      	</div>
			</a>
      		</div>
      		<div class="col-md-4">
      			<a href="<?php echo	base_url() ?>admin/food/showLunch">
			      	<div class="card card-info">
			      		<div class="card-body  bg-warning text-center">
			      				<i class="mdi mdi-rice mdi-48px text-danger"></i>
			      		</div>
			      		<div class="card-footer text-center">
			      			<div class="card-text"><h4>Lunch</h4></div>
			      		</div>
			      	</div>
			</a>
      		</div>
      		<div class="col-md-4">
      			<a href="<?php echo	base_url() ?>admin/food/showDinner">
			      	<div class="card card-info">	
			      		<div class="card-body  bg-success text-center">
			      				<i class="mdi mdi-food mdi-48px text-danger"></i>
			      		</div>
			      		<div class="card-footer text-center">
			      			<div class="card-text"><h4>Dinner</h4></div>
			      		</div>
			      	</div>
						</a>
      		</div>
      	</div>
      </div>
    </div>
</div>


