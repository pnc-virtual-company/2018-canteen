
<style>
  body {
    background: linear-gradient(45deg, rgba(255,255,255, 0.2), 
    rgba(0, 0, 0,0.6)), 
    url('<?php echo base_url();?>assets/images/background.jpg') no-repeat center bottom;
    background-size: cover;
  }
  #canteen-logo {
    width: 25%;
    margin-left:38%;
  }
</style>
<div class="container">
<?php echo $flashPartialView;?>
  <?php
  $attributes = array('id' => 'formLogin', 'class' => 'form-signin');
  echo form_open('connection/login', $attributes); ?>
    <img src="<?php echo base_url();?>assets/images/pnc-canteenEnd.png" alt="canteen-logo" id="canteen-logo" class="text-center">
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6 jumbotron">
        <div class="card bg-default ">
          <div class="card-body">
              <div class="form-group">
                <input type="text" name="login" class="form-control" placeholder="Login" required autofocus id="login">
              </div>
              <div class="form-group">
               <input type="password" name="password" class="form-control" placeholder="Password" required id="password">
              </div>
               <button class="btn btn-outline-info float-right " type="submit" id="btn-login">Sign in</button>
               <a href="<?php echo base_url() ?>" class="btn btn-outline-danger ">Cancle</a>
                <?php echo validation_errors() ?>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-3"></div>
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
</script>
