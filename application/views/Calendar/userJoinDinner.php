<?php
/**
 * List all users that participated to the event & doing remind sending email to  unconfirmed user to participate
 * @return int number of affected rows
 * @author sun MEAS <sun.meas@gmail.com>
 */
?>
<style>
  table{
    box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
   .dish-info{
      padding-left: 16px;
    }
    .modal-title{
    margin-left: 150px;
    }

  table{
    box-shadow: 2px 2px 2px gray;
  }
  .clearfix {
    hieght: 10px;
    clear:both;
  }
</style>
<main class="app-content">
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Manage User Join Dinner List</h1>
          <p>This application is very useful for admin and finance to manage their needs.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url() ?>calendar/getDinnerEvent"><span class="mdi mdi-plus-circle" style="font-size: 20px;"></span>&nbsp;&nbsp;Add Dinner Event</a></li>
        </ul>
  </div>
  <div class="col-md-1 col-sm-0 col-xs-12"></div>
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo base_url();?>admin/UserjoinEvent/exportUserJoinEvent" class="btn btn-primary float-right"><i class="mdi mdi-file-excel"></i>&nbsp;Export</a>
        <table id="user" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" width="100%">
          <thead class="bg-dark text-white">
              <tr>
                  <th>User ID</th>
                  <th>User Name</th>
                  <th>Position</th>
                  <th>Email</th>
                  <th>Dinner Event</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($joinEvent as $value):?> 
                <tr>
                 
                  <td><?php echo $value->join_event_id ?></td>
                  <td><?php echo $value->user_name ?></td>
                  <td><?php echo $value->position ?></td>
                  <td><a href="#"><?php echo $value->email ?></a></td>
                  <td><?php echo $value->Title ?></td>
                </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    </div>
</main>

<link href="<?php echo base_url();?>assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    //Transform the HTML table in a fancy datatable
    $('#user').dataTable({
        stateSave: true,
    });
});
</script>
