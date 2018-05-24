<?php
/**
 * This view displays the list of users.
 * @copyright  Copyright (c) 2014-2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
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
      <div class="col-md-3">
        <div class="form-group">
           <label class="control-label col-sm-2" for="email">Date</label>
           <div class="col-sm-10">
              <input type="text" id="datepicker" name="mealDate">
           </div>
         </div>
      </div>
      <div class="col-md-6"></div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="sel1">Meal</label>
          <select class="form-control" id="sel1">
            <option value="">select meal time</option>
            <option >BreakFast</option>
            <option>Lunch</option>
            <option>Dinner</option>
          </select>
        </div>
      </div>
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
                foreach ($preOrder as $dish):
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
    $('#food').dataTable({
        stateSave: true,
    });
  $('#datepicker').datepicker({format: 'yyyy-mm-dd'});
});
</script>
