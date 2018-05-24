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
          <h1><i class="fa fa-dashboard"></i>Manage Users</h1>
          <p>This application is very useful for admin and finance to manage their needs.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/User/createUser"><span class="mdi mdi-plus-circle" style="font-size: 20px;"></span>&nbsp;&nbsp;Add New User</a></li>

        </ul>
  </div>
    <div class="row">
      <div class="col-md-12">
        <?php echo $flashPartialView;?>
        <table id="user" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" width="100%">
          <thead class="bg-dark text-white">
              <tr>
                  <th>User Card ID</th>
                  <th>User Name</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>Department Name</th> 
                  <th>User Role</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user):?>
                <tr>
                 
                  <td><?php echo $user->card_id ?></td>
                  <td><?php echo $user->firstname." ".$user->lastname ?></td>
                  <td><?php echo $user->gender ?></td>
                  <td><?php echo $user->email ?></td>
                  <td><?php echo $user->class_name ?></td>
                  <td><?php echo $user->rolename?></td>
                <!--   <td>
                    <img src="<?php echo base_url().'assets/uploads/'.$user->user_image ?>" alt="image" class="img-thumbnail" style="width:10%;">
                  </td> -->
                  <td>
                    <a href="javascript:void()" data-toggle="modal" data-target="#exampleModal" title="View User" data-whatever="@getbootstrap" 
                      user_name="<?php echo $user->firstname." ".$user->lastname  ?>" 
                      user_img="<?php echo base_url().'assets/images/user_uploads/'.$user->image ?>" 
                      user_fname="<?php echo $user->firstname ?>"
                      user_lname="<?php echo $user->lastname ?>"
                      user_gender="<?php echo $user->gender ?>"
                      user_login="<?php echo $user->login ?>"
                      user_email="<?php echo $user->email ?>"
                      user_card_id="<?php echo $user->card_id ?>"
                      user_role = "<?php echo $user->rolename ?>"
                      user_classname = "<?php echo $user->class_name ?>"
                      
                      class="show_user_detail" 
                    >
                      <span class="mdi mdi-eye-outline text-success" style="font-size: 20px;"></span>
                    </a>&nbsp;&nbsp;
                    <a href="<?php echo base_url() ?>admin/User/updateUser/<?php echo $user->id ?>" title="Edit User">
                      <i class="mdi mdi-pencil" style="font-size: 20px;"></i>
                    </a>&nbsp;&nbsp;
                    <a href="<?php echo base_url() ?>admin/User/deleteUser/<?php echo $user->id ?>" class="confirm-delete text-danger" title="Delete User" style="font-size: 20px;">
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
<!-- create modal of order item -->
      <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title text-center text-info" id="exampleModalLabel ">User Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
               
              <div class="modal-body ">
                  
                   <div class="row">
                          <div class="col-md-4">
                            <img src="" alt="image" class="img-thumbnail mx-auto d-block pop_user_img" >
                          </div>
                           <div class="col-md-8">
                            <ul>
                                <li>Card ID: <span class="text-info pop_user_cardid"></span></li>
                                <li>First Name: <span class="text-info pop_user_fname"></span></li>
                                <li>last Name: <span class="text-info pop_user_lname"></span></li>
                                <li>Gender: <span class="text-info pop_user_gender"></span></li>
                                <li>Email: <span class="text-info pop_user_email"></span></li>
                                <li>Department Name: <span class="text-info pop_user_classname"></span></li>
                                <li>User Role: <span class="text-info pop_user_role"></span></li>
                            </ul>
                          </div>
                   </div>
                   <div class="row">
                    <div class="col-md-4">
                      <h5 class="text-center text-success pop_user_name"></h5>
                    </div>
                      <div class="col-md-8">
                      </div>
                   </div>
              </div>
              <div class="modal-footer text-center">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

<link href="<?php echo base_url();?>assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    //Transform the HTML table in a fancy datatable
    $('#user').dataTable({
        stateSave: true,
        'ordering':false
    });
    $('#user').on('click', '.show_user_detail', function(e){
        // => Get the value of current attribute on the its link clicked
        var user_name = $(this).attr('user_name');
        var user_img = $(this).attr('user_img');
        var user_fname = $(this).attr('user_fname');
        var user_lname = $(this).attr('user_lname');
        var user_login = $(this).attr('user_login');
        var user_email = $(this).attr('user_email');
        var user_card_id = $(this).attr('user_card_id');
        var user_card_gender = $(this).attr('user_gender');
        var user_role = $(this).attr('user_role');
        var user_classname = $(this).attr('user_classname');
        

        // => After get the value then let set it into popup
          $('.pop_user_name').text(user_name);
          $('.pop_user_img').attr('src', user_img);
          $('.pop_user_fname').text(user_fname);
          $('.pop_user_lname').text( user_lname);
          $('.pop_user_login').text(user_login);
          $('.pop_user_email').text(user_email); 
          $('.pop_user_cardid').text(user_card_id);
          $('.pop_user_gender').text(user_card_gender);
          $('.pop_user_role').text(user_role);
          $('.pop_user_classname').text(user_classname);
    });
});
</script>
