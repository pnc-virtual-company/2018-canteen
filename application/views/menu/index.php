<?php 
/**
  * This view display the menu in public user interface
  * @author davy poeng <davy.poeng@student.passerellesnumeriques.org>
 */
 ?>
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
       <li class=" nav-item">
        <a class=" btn text-white active" href="<?php echo base_url() ?>"><i class="mdi mdi-home-circle"></i>&nbsp;&nbsp;Home</a>
       </li>
      <li class="nav-item">
        <a class="btn text-white" href="<?php echo base_url() ?>welcome/favoriteFood"><i class="mdi mdi-heart"></i>&nbsp;&nbsp;Favorite Food</a>
      </li>
      <?php if($this->session->isSuperAdmin || $this->session->isStaff) { ?>
        <li class="nav-item">
          <a class="btn text-white" href="<?php echo base_url() ?>Welcome/getJoinDinnerEvent"><span class="mdi mdi-calendar-multiple-check"></span>&nbsp;&nbsp;Calendar</a>
        </li>
      <?php } ?>
    </ul>
    </div>
      <ul class="navbar-nav ml-auto">
       <?php if($this->session->isAdmin || $this->session->isSuperAdmin) { ?>
          <li>
             <a href="<?php echo base_url() ?>Dishes" class="text-white" style="font-size: 25px;" title="Go to dashboard" data-toggle="tooltip" data-placement="left"><span class="mdi mdi-arrow-right-bold-circle-outline text-white"></span>&nbsp;&nbsp;</a>
          </li>
      <?php } ?>
        <?php if($this->session->loggedIn === TRUE) { ?>
          <li class="nav-item ">
              <a class="nav-link text-white" title="Sign Out" href="<?php echo base_url();?>connection/logout">
                <?php echo $this->session->fullname;?> <i class="mdi mdi-power"></i>
              </a>
          </li>
          <?php }else { ?>

              <li class="nav-item <?php echo ($activeLink=='users'?'actives':'');?>">
                <div class="row">
                  <a class="mdi mdi-lock text-white" href="<?php echo base_url();?>Dishes">&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;</a>
                  <a class=" text-white">OR&nbsp;&nbsp;&nbsp;&nbsp;</a>
                  <a class=" text-white mdi mdi-account-plus" href="<?php echo base_url();?>Register">&nbsp;&nbsp;Register&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                </div>
              </li>
          <?php }?>
      </ul>
  </div>
</nav>
<script>
  $(document).ready(function(){
     $('[data-toggle="tooltip"]').tooltip();  
  })
</script>