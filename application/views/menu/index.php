<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$activeLink = (isset($activeLink)) ? $activeLink :  "";?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<nav class="navbar navbar-expand-md navbar-dark fixed-top" id ="menu-background">

  <a class="navbar-brand" href="<?php echo base_url();?>">
  <img src="<?php echo base_url();?>assets/images/pnc-canteenEnd.png" alt="" style="width:65px">PNC CANTEEN</a>

  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <div id="focuse_menu">
    <ul class="navbar-nav">
       <li class=" nav-item ">
        <a class=" btn text-white active" href="<?php echo base_url() ?>">Home</a>
       </li>
      <li class="nav-item ">
        <a class=" btn  text-white" href="<?php echo base_url() ?>dishes/favouriteFood">Favrite Food</a>
      </li>
      <li class="nav-item ">
        <a class=" btn nav-link text-white" href="<?php echo base_url() ?>calendar/getStuffCalendar">Calendar</a>
      </li>
    </ul>
    </div>
      <ul class="navbar-nav ml-auto">
        <?php if($this->session->loggedIn === TRUE) { ?>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>connection/logout">
                <?php echo $this->session->fullname;?> <i class="mdi mdi-power"></i>
              </a>
          </li>
          <?php }else { ?>

              <li class="nav-item <?php echo ($activeLink=='users'?'actives':'');?>">
                <div class="row">
                  <div class="col-md-5">
                     <a class="nav-link " href="<?php echo base_url();?>users"><i class="mdi mdi-lock "></i>&nbsp;Login</a>
                  </div>
                  <div class="col-md-2">
                    <a class="nav-link">OR</a>
                  </div>
                  <div class="col-md-5">
                     <a class="nav-link " href="<?php echo base_url();?>c_users/addUsers"><i class="mdi mdi-lock "></i>&nbsp;Register</a>
                  </div>
                </div>
              </li>
          <?php }?>
      </ul>
  </div>
</nav>
