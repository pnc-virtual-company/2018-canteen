
<style>
  body {
    background: linear-gradient(45deg, rgba(255,255,255, 0.2), 
    rgba(0, 0, 0,0.6)), 
    url('<?php echo base_url();?>assets/images/register.jpg') no-repeat center bottom;
    background-size: cover;
  }
  #canteen-logo {
    width: 25%;
    margin-left:38%;
  }
</style>
<div class="container">
    <img src="<?php echo base_url();?>assets/images/pnc-canteenEnd.png" alt="canteen-logo" id="canteen-logo" class="text-center">
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10 jumbotron">
        <h2 class="text-center text-success">Register Form</h2>
        <div class="card bg-default ">
          <div class="card-body">
           <form action="<?php echo base_url() ?>users/create" method="post">
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
                  <label for="username"><strong>User Name</strong></label>
                  <input type="text" name="username" class="form-control" placeholder="username" required>
                </div>
                <div class="form-group col">
                  <label for="year"><strong>Email</strong></label>
                  <input type="email" placeholder="email" required class="form-control" name="email" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <label for="class"><strong>Class Name</strong></label>
                  <input type="text" name="class" class="form-control" placeholder="WEP-2018" required>
                </div>
                <div class="form-group col">
                  <label for="idnumber"><strong>Student ID</strong></label>
                  <input type="text" class="form-control" placeholder="PNC2018-009" required name="idnumber">
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <label for="userid"><strong>Password</strong></label>
                  <input type="password" placeholder="password" name="password" class="form-control" require>
                </div>
                <div class="form-group col">
                  <label for="picture"><strong>Student Picture</strong></label>
                  <input type="file" class="form-control" required name="picture">
                </div>
              </div>
              <div class="form-group">
                <label for="gender"><strong>Gender</strong></label>
                <input type="radio" name="gender" value="Male" checked> Male
                <input type="radio" name="gender" value="Female"> Female
              </div>
              <button class=" btn btn-danger" onclick="goBack()"><i class="mdi mdi-cancel"></i>&nbsp;Cancel</button>
              <button class=" btn btn-info float-right" type="submit"><i class="mdi mdi-account-plus"></i>&nbsp;Register</button>
            </form>
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
    });
  function goBack() {
    window.history.back();
}

</script>