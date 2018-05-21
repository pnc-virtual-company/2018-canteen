
<?php
/**
 * This view displays the list of menu food.
 * @copyright  Copyright (c) 2017-2018 khai hok
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
 */
?>
<style>
  [title~=datepicker] {
    border:none;
    outline: none;
    width:230px;
    padding: 5px;
    background: #e5e5e5;
    border-bottom: 2px solid gray;
  }
</style>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i>Create Menu For Today</h1>
      <p>There are a lot of food to cook for PNC students and stafs.</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/food/add_dish"><span class="mdi mdi-plus-circle" style="font-size: 20px;"></span>&nbsp;&nbsp;Add New Food</a></li>
    </ul>
  </div>
  <?php echo $flashPartialView;?>
  <form action="<?php echo base_url() ?>admin/create_menu/postMenu" method="POST" >
    <div class="row">
      <div class="col-md-1">
       <label ><strong>Date:</strong></label>
     </div>
     <div class="col-md-3 col-sm-6 col-xs-12">
       <div class="input-group">
          <input type="text" id="datepicker" name="mealDate" title="datepicker" placeholder="Select date here">
       </div>
     </div>
     <div class="col-md-3 col-sm-0 col-xs-0"></div>
     <div class="col-md-1">
       <label for="exampleSelect1"><strong>Meal:</strong></label>
     </div>
     <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="form-group">
       <select class="form-control"  name="meal_time" id="">
        <?php 
        foreach($meal_time as $row)
        { 
          echo '<option value="'.$row->time_id.'">'.$row->name.'</option>';
        }
        ?>
      </select>
    </div>
  </div>
  <div class="col-md-1 col-sm-0 col-xs-12"></div>
</div>
<br><br>
<div class="row">
  <?php foreach($data_image as $dish) { ?>
  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 nopad text-center" style="margin-bottom: 20px;">
    <label class="image-checkbox"> 
      <input type="checkbox" name="dish_id[]" value="<?php echo $dish->dish_id ?>">
      <img class="img-responsive" src="<?php echo base_url('assets/images/dish_uploads/'.$dish->dish_image); ?>" width="100%"  alt="" />
      <span class="mdi mdi-check d-none" style="font-size: 20px;"></span>
      <div class="text-center bg-primary" style="padding: 7px;">
       <h5>
        <?php echo $dish->dish_id ?>.&nbsp;<?php echo $dish->dish_name ?></h5>
      </div>
    </label>
  </div>
  <?php } ?>
</div>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
   <h3><u>Food Description</u></h3>
   <textarea class="form-control form-rounded" rows="3" placeholder="Please inter description of menu" name="menuDescription"></textarea><br>
   <!--   <input type="submit" name="submit" value="submit"> -->
   <button type="submit" name="submit" value="submit" class="btn btn-primary" target="_blank">Create Menu</button>
 </div>
 <div class="col-md-2"></div>
</div>
</form>
</main>
  <script src="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/css/bootstrap-datepicker.min.css"></script>
  <script src="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/js/bootstrap-datepicker.min.js"></script>
<script>  
 $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    orientation:"bottom",
    todayBtn: true,
    todayHighlight: true,
    autoclose:true,
});
  // image gallery
  // init the state from the input
  $(".image-checkbox").each(function () {
    if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
      $(this).addClass('image-checkbox-checked');
    }
    else {
      $(this).removeClass('image-checkbox-checked');
    }
  });
  // sync the state to the input
  $(".image-checkbox").on("click", function (e) {
    $(this).toggleClass('image-checkbox-checked');
    var $checkbox = $(this).find('input[type="checkbox"]');
    $checkbox.prop("checked",!$checkbox.prop("checked"))

    e.preventDefault();
  });
</script>





