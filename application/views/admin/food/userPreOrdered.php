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
            <h1><i class="fa fa-dashboard"></i>Users Pre-Ordered</h1>
            <p>This application is very useful for admin and finance to manage their needs.</p>
        </div>
  </div>
    <div class="row">
      <div class="col-md-12">
        <table id="food" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" width="100%">
          <thead class="thead-dark">
              <tr>
                  <th>Card ID</th>
                  <th>User Ordered Name</th>
                  <th>Department Name</th>
                  <th>Pre-Order Quantity</th>
                  <th>Payment</th>
              </tr>
          </thead>
          <tbody>
            <?php 
                foreach ($userPreOrder as $dish):
              ?>
                <tr>
                  <td><?php echo $dish->userId?></td>
                  <td> <?php echo $dish->userName; ?> </td>                 
                  <td><?php echo $dish->class_name ?></td>
                  <td><?php echo $dish->totalQuanttiy?> Dishes</td>
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
