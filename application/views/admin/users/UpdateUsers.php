<style>
  .card{
    box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
  input[type="radio"]{
    margin-left: 40px;
  }
</style>
<div class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Canteen Management System</h1>
          <p>This application is very useful for admin and finance to manage their needs.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/User/listUsers"><span class="mdi mdi-arrow-left-bold-circle-outline" style="font-size: 20px;"></span>&nbsp;&nbsp;Go Back</a></li>
        </ul>
  </div>
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <h2 class="text-center text-info">Form Update Users</h2><br>
        <div class="card bg-secondary text-warning">
          <div class="card-body">
            <?php 
                  foreach ($getUsersUpdate as $user) {
               
             ?>
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
                  <input type="text" name="username" class="form-control" placeholder="username" required value="<?php echo $user->login ?>">
                </div>
                <div class="form-group col">
                  <label for="email"><strong>Email</strong></label>
                  <input type="email" placeholder="email" required class="form-control" name="email" required value="<?php echo $user->email ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <label for="class"><strong>Class Name</strong></label>
                  <input type="text" name="class" class="form-control" placeholder="WEP-2018" required value="<?php echo $user->class_name ?>">
                </div>
                <div class="form-group col">
                  <label for="cardId"><strong>Card ID</strong></label>
                  <input type="text" class="form-control" placeholder="PNC2018-009" required name="cardId" value="<?php echo $user->card_id ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <label for="password"><strong>Password</strong></label>
                  <input type="password" class="form-control" required name="password" value="<?php echo $user->password ?>">
                </div>
                <div class="form-gorup col">
                  <label for="image"><strong>Student Picture</strong></label>
                  <input type="file" class="form-control" required name="image" value="<?php echo $user->image?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <label for="gender"><strong>Gender</strong></label>
                  <input type="radio" name="gender" value="Male" 
                  <?php 
                      if ($user->gender == "Male") {
                          echo "checked";
                      } 
                  ?>
                  > Male
                  <input type="radio" name="gender" value="Female"
                    <?php 
                      if ($user->gender == "Female") {
                          echo "checked";
                      }
                     ?>
                  > Female
                </div>
              </div>
              <?php      
                  } ?>
              <button class=" btn btn-danger" onclick="goBack()"><i class="mdi mdi-cancel"></i>&nbsp;Cancel</button>
              <button class=" btn btn-info float-right" type="submit"><i class="mdi mdi-account-plus"></i>&nbsp;Update</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-1"></div>
    </div>
  </div>
</div> <!-- /container -->

<script>
    $(function(){
      $('.form-control').keypress(function(event) {
          if (event.keyCode == 13 || event.which == 13) {
              $('#formLogin').submit();
          }
      });
    });s
  function goBack() {
    window.history.back();
}

</script>