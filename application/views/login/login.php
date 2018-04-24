
<style>
  body {
    background: linear-gradient(45deg, rgba(255,255,255, 0.2), 
   rgba(43, 139, 227, 0.85)), 
   url('images/background.jpg') no-repeat center bottom;
   background-repeat: no-repeat;
   background-size: cover;
  }
</style>
<div class="container login">
<?php echo $flashPartialView;?>
  <?php
  $attributes = array('id' => 'formLogin', 'class' => 'form-signin');
  echo form_open('connection/login', $attributes); ?>
    <!-- <h1 class="text-center">Please Sign In</h1> -->
    <br>
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6 jumbotron">
        <div class="card bg-default ">
          <div class="card-body">
            <form action="<?php echo base_url() ?>c_admin/login" method="post">
              <div class="form-group">
                <input type="text" name="login" class="form-control" placeholder="Login" required autofocus>
              </div>
              <div class="form-group">
               <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>
               <button class="btn btn-outline-info float-right " type="submit">Sign in</button>
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
