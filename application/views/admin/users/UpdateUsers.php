<style>
  .card{
    box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    background-color:#009688;
  }
  input[type="radio"]{
    margin-left: 40px;
  }
</style>
<div class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Form update User Profile</h1>
          <p>This application is very useful for admin and finance to manage their needs.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/User/listUsers"><span class="mdi mdi-arrow-left-bold-circle-outline" style="font-size: 20px;"></span>&nbsp;&nbsp;Go Back</a></li>
        </ul>
  </div>
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <div class="card text-white">
          <div class="card-body">
            <?php 
               foreach ($getUsersUpdate as $user) {
             ?>
            <h1 class="text-center">Form Update Users</h1>
           <form action="<?php echo base_url() ?>admin/User/updateUser/<?php echo $user->id ?>" enctype="multipart/form-data"   method="POST">
              <div class="row">
                <div class="form-group col">
                  <label for="firstname"><strong>First Name</strong></label>
                  <input type="text" name="firstname" class="form-control" placeholder="firstname" required value="<?php echo $user->firstname ?>">
                </div>
                <div class="form-group col">
                  <label for="lastname"><strong>Last Name</strong></label>
                  <input type="text" name="lastname" class="form-control" placeholder="lastname" required value="<?php echo $user->lastname ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <label for="username"><strong>User Name</strong></label>
                  <input type="text" name="username" class="form-control" placeholder="login Name" required value="<?php echo $user->login ?>">
                </div>
                <div class="form-group col">
                  <label for="email"><strong>Email</strong></label>
                  <input type="email" placeholder="email" required class="form-control" name="email" required value="<?php echo $user->email ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <label for="class"><strong>Department Name</strong></label>
                  <input type="text" name="class" class="form-control" required value="<?php echo $user->class_name ?>">
                </div>
                <div class="form-group col">
                  <label for="cardId"><strong>Card ID</strong></label>
                  <input type="text" class="form-control" required name="cardId" value="<?php echo $user->card_id ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <label for="password"><strong>Change New Password</strong></label>
                  <input type="password" class="form-control" name="password" placeholder="New password">
                </div>
                <div class="form-gorup col">
                  <label for="">User Role</label>
                    <select class="form-control" name="role">
                      <?php foreach ($roles as $role): ?>
                        <option value="<?php echo $role->id ?>" <?php if ($role->id == $user->role) echo "selected" ?>><?php echo $role->name ?></option>
                      <?php endforeach ?>
                    </select>
                </div>
              </div>
              <div class="row">
                 <div class="form-group col">
                  <label for="image"><strong>Profile Image</strong></label>
                  <input type="file" class="form-control" name="image">
                  <!-- show error message when upload image  -->
                  <p><?php echo $error_msg ?></p>
                </div>
                <div class="form-group col-md-6"><br>
                  <label for="gender"><strong>Gender:</strong></label>
                  <input type="radio" id="female" name="gender" value="Female"
                    <?php 
                      if ($user->gender == "Female") {
                          echo "checked";
                      }
                     ?>
                  > <label for="female">&nbsp;&nbsp;Female</label>
                  <input type="radio" id="male" name="gender" value="Male" 
                  <?php 
                      if ($user->gender == "Male") {
                          echo "checked";
                      } 
                  ?>
                  ><label for="male">&nbsp;&nbsp;Male</label> 
                </div>
              </div>
              <?php      
                  } ?>
              <a href="<?php echo base_url() ?>admin/User/listUsers" class=" btn btn-danger"><i class="mdi mdi-cancel"></i>&nbsp;Cancel</a>
              <button class=" btn btn-warning float-right" type="submit"><i class="mdi mdi-account-plus"></i>&nbsp;Update</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-1"></div>
    </div>
  </div>
</div> <!-- /container -->