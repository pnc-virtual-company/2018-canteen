<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$activeLink = (isset($activeLink)) ? $activeLink :  "";?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

<<<<<<< HEAD
  <a class="navbar-brand" href="<?php echo base_url();?>">
  <img src="<?php echo base_url();?>assets/images/canteen-logo.png" alt="" style="width:65px">PNC CANTEEN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=" #navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
=======
  <a class="navbar-brand" href="<?php echo base_url();?>">PNC-CANTEEN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
>>>>>>> 2c5f5a0972b1e27d6772cb0ccedfd90fb5b2a0df
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo ($activeLink=='home'?'active':'');?>">
        <a class="nav-link" href="<?php echo base_url();?>">Home</a>
      </li>
      <li class="nav-item <?php echo ($activeLink=='examples'?'active':'');?>">
        <a class="nav-link" href="<?php echo base_url();?>examples/views/index">Examples</a>
      </li>
      <li class="nav-item <?php echo ($activeLink=='users'?'active':'');?>">
        <a class="nav-link" href="<?php echo base_url();?>users"><i class="mdi mdi-lock"></i>&nbsp;Login</a>
      </li>
    </ul>
  </div>

<?php if($this->session->loggedIn === TRUE) { ?>
  <div class="navbar-collapse collapse navbar-right">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>connection/logout">
                <?php echo $this->session->fullname;?> <i class="mdi mdi-power"></i>
              </a>
          </li>
      </ul>
  </div>
<?php } ?>
</nav>
