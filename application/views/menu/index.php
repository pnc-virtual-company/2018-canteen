<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$activeLink = (isset($activeLink)) ? $activeLink :  "";?>

<nav class="navbar navbar-expand-md navbar-dark fixed-top" id ="menu-background">

  <a class="navbar-brand" href="<?php echo base_url();?>">
  <img src="<?php echo base_url();?>assets/images/pnc-canteen.png" alt="" style="width:65px">PNC CANTEEN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=" #navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse navbar-right">
      <ul class="navbar-nav ml-auto">
        <?php if($this->session->loggedIn === TRUE) { ?>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>connection/logout">
                <?php echo $this->session->fullname;?> <i class="mdi mdi-power"></i>
              </a>
          </li>
          <?php }else { ?>

              <li class="nav-item <?php echo ($activeLink=='users'?'active':'');?>">
              <a class="nav-link " href="<?php echo base_url();?>users"><i class="mdi mdi-lock "></i>&nbsp;Login</a>
              </li>
          <?php }?>
      </ul>
  </div>

</nav>
