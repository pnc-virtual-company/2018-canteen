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
  table{
    box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
</style>
<main class="app-content">
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Canteen Management System</h1>
          <p>This application is very useful for admin and finance to manage their needs.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/User/createUser"><span class="mdi mdi-plus-circle" style="font-size: 20px;"></span>&nbsp;&nbsp;Add new user</a></li>

        </ul>
  </div>
    <div class="row">
      <div class="col-md-12">
        <table id="food" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" width="100%">
          <thead class="bg-secondary text-white">
              <tr>
                  <th>User ID</th>
                  <th>User Name</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>Class Name</th> 
                  <th>Card ID</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user):?>
                <tr>
                  <td><?php echo $user->id ?></td>
                  <td><?php echo $user->firstname." ".$user->lastname ?></td>
                  <td><?php echo $user->gender ?></td>
                  <td><?php echo $user->email ?></td>
                  <td><?php echo $user->class_name ?></td>
                  <td><?php echo $user->card_id ?></td>
                <!--   <td>
                    <img src="<?php echo base_url().'assets/uploads/'.$user->user_image ?>" alt="image" class="img-thumbnail" style="width:10%;">
                  </td> -->
                  <td>
                    <a href="<?php echo base_url() ?>admin/User/viewUserDetail/<?php echo $user->id ?>" title="View food">
                      <span class="mdi mdi-eye-outline text-success" style="font-size: 20px;"></span>
                    </a>&nbsp;&nbsp;
                    <a href="<?php echo base_url() ?>admin/User/updateUser/<?php echo $user->id ?>" title="Edit user">
                      <i class="mdi mdi-pencil" style="font-size: 20px;"></i>
                    </a>&nbsp;&nbsp;
                    <a href="<?php echo base_url() ?>admin/User/deleteUser/<?php echo $user->id ?>" class="confirm-delete text-danger" title="Delete user" style="font-size: 20px;">
                      <i class="mdi mdi-delete" onclick="return confirm('Are you sure to delete this user?')"></i>
                    </a>
                    </td>
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

});
</script>
