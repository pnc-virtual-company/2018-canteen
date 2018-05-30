<?php
/**
 * This view is to display all the dish whicha are already ordered
 * @copyright  Copyright (c) 2014-2018 kimsoeng kao
 */
?>
<style>
    .dish-info{
      padding-left: 16px;
    }
    .modal-title{
    margin-left: 150px;
    }
  table{
    box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

</style>
<main class="app-content">
  <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>Dishes Pre-Ordered</h1>
            <p>This application is very useful for admin and finance to manage their needs.</p>
        </div>
  </div>
      <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="sel1">Select Meal Type</label>
              <select class="form-control" id="sel1" onchange="location = this.value;">
                <option value="<?php echo base_url() ?>admin/PreOrder/preOrderList/0" 
                    <?php if ($mealTypeId == 0) {echo "selected";}?> >All
                </option>
                <option value="<?php echo base_url() ?>admin/PreOrder/preOrderList/1"
                 <?php if ($mealTypeId == 1) {echo "selected";}?> >BreakFast
                </option>
                <option value="<?php echo base_url() ?>admin/PreOrder/preOrderList/2"
                   <?php if ($mealTypeId == 2) {echo "selected";}?> >Lunch</option>
                <option value="<?php echo base_url() ?>admin/PreOrder/preOrderList/3"
                   <?php if ($mealTypeId == 3) {echo "selected";}?> >Dinner</option>
              </select>
            </div>
          </div>
      </div>
      <div class="row">
      <div class="col-md-12">
         <a href="<?php echo base_url();?>admin/PreOrder/exportDishOrdered" class="btn btn-primary float-right"><i class="mdi mdi-file-excel"></i>&nbsp;Export</a>
        <table id="food" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" width="100%">
          <thead class="thead-dark">
              <tr>
                  <th>Dish Name</th>
                  <th>Total Quantity</th>
                  <th>Total Payment</th>
              </tr>
          </thead>
          <tbody>
            <?php 
                foreach ($dishes as $dish):
              ?>
                <tr>
                  <td><?php echo $dish->dishName?></td>
                  <td> <?php echo $dish->TotalQuantity;?> Dishes </td>                 
                  <td><?php echo $dish->TotalPayment ?> Riels</td>
                </tr>
       <?php endforeach ?>  
          </tbody>
        </table>
      </div>
    </div>
</main>
<link href="<?php echo base_url();?>assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    //Transform the HTML table in a fancy datatable
    // Change url when select meal time id
  $('.meal_time').change(function(){
   
   var val_time = $(this).val();
      
if(val_time == "1"){
       
 window.location.href = "<?php echo base_url(); ?>admin/PreOrder/preOrderList?meal_time=1";
      
}
      else if(val_time == "2")
     
 {
        window.location.href = "<?php echo base_url(); ?>admin/PreOrder/preOrderList?meal_time=2";
     
 }
      else if(val_time == "3")
      
{
        window.location.href = "<?php echo base_url(); ?>admin/PreOrder/preOrderList?meal_time=3";
   
   }else{
     
   window.location.href = "<?php echo base_url(); ?>admin/PreOrder/preOrderList";
      }
  });
    $('#food').dataTable({
        stateSave: true,
        'ordering':false
    });
  $('#datepicker').datepicker({format: 'yyyy-mm-dd'});
});
</script>
