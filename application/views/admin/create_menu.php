
<?php
/**
 * This view displays the list of users.
 * @copyright  Copyright (c) 2014-2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
 */
?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i>Post Your Favorit Food</h1>
      <p>All best food in Passerelles Numeriques Cambodai canteen</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="#"><span class="mdi mdi-plus-circle" style="font-size: 20px;"></span>&nbsp;&nbsp;Add New Food</a></li>
    </ul>
  </div>
  <div class="row">
  <div class="col-md-1">
     <label ><strong>Date:</strong></label>
  </div>
  <div class="col-md-3"><input id="datepicker"/></div>
  <div class="col-md-3"></div>
  <div class="col-md-1">
     <label for="exampleSelect1"><strong>Meal:</strong></label>
  </div>
  <div class="col-md-3">
    <div class="form-group">
        <select class="form-control" id="exampleSelect1">
          <option>Breakfast</option>
          <option>Lunch</option>
          <option>Dinner</option>
        </select>
      </div>
  </div>
  <div class="col-md-1"></div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <h2><u>List all dishes</u></h2>
  </div>
</div>
<div class="row">
  <div class="col-md-3">
      
  </div>
</div>
</main>
  
 <script>
  $('#datepicker').datepicker({
    uiLibrary: 'bootstrap4'
  });
</script>


