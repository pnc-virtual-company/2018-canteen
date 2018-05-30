<?php
/**
 * This view is used to display the form to create a new user
 * @copyright  Copyright (c) 2014-2018 kimsoeng kao
 */
?>
<style>
   .card{
    box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    background-color:#009688;
  }
</style>
<div class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Form To Create New Staff</h1>
          <p>This application is very useful for admin and finance to manage their needs.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/User/listUsers"><span class="mdi mdi-arrow-left-bold-circle-outline" style="font-size: 20px;"></span>&nbsp;&nbsp;Go Back</a></li>
        </ul>
  </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-sm-10">
        <div class="card bg-default ">
          <div class="card-body text-white">
          <h1 class="text-center">Add New Staff</h1>
           <form action="<?php echo base_url(); ?>admin/user/createUser" enctype="multipart/form-data" method="POST">
              <div class="row">
                <div class="form-group col">
                  <label for="firstname"><strong>First Name</strong></label>
                  <input type="text" name="firstname" class="form-control" placeholder="firstname" required>
                </div>
                <div class="form-group col">
                  <label for="lastname"><strong>Last Name</strong></label>
                  <input type="text" name="lastname" class="form-control" placeholder="lastname" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <label for="username"><strong>Login Name</strong></label>
                  <input type="text" name="loginname" class="form-control" placeholder="login Name" required>
                </div>
                <div class="form-group col">
                  <label for="email"><strong>Email</strong></label>
                  <input type="email" placeholder="email" required class="form-control" name="useremail" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <label for="class"><strong>Department Name</strong></label>
                  <input type="text" name="classname" class="form-control" placeholder="Department Name" required>
                </div>
                <div class="form-group col">
                  <label for="cardId"><strong>Card ID</strong></label>
                  <input type="text" class="form-control" required name="cardid" placeholder="Staff ID">
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <label for="password"><strong>Password</strong></label>
                  <input type="password" placeholder="password" name="password" class="form-control" require>
                </div>
                <div class="form-group col">
                  <label for="image"><strong>Staff Picture</strong></label>
                  <input type="file" class="form-control" required name="userimage">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label><strong>Choose Role</strong></label>
                  <select name="userRole"  class="form-control">
                      <?php 
                        foreach ($roles as $role) {
                       ?>
                       <option value="<?php echo $role->id ?>"><?php echo $role->name ?></option>
                       <?php } ?>
                  </select>
                </div>
                <div class="col form-group col-md-6"><br>
                  <label for="gender"><strong>Gender</strong></label><br>
                  <input type="radio" name="gender" value="Female" id="female" checked><label for="female">&nbsp;&nbsp;Female</label> 
                  <input type="radio" name="gender" value="Male" id="male"><label for="male">&nbsp;&nbsp;Male</label> 
                </div>
              </div>
             <a class=" btn btn-danger" href="<?php echo base_url() ?>admin/User/listUsers"><i class="mdi mdi-cancel"></i>&nbsp;Cancel</a>
              <button class=" btn btn-warning float-right" type="submit"><i class="mdi mdi-account-plus"></i>&nbsp;Add Staff</button>
            </form>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>
</div> <!-- /container