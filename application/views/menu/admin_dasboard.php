<header class="app-header">
  <a class="app-header__logo" href="index.html">Canteen MS</a>
  <!-- Sidebar toggle button-->
  <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar">
   <!--  <span class="mdi mdi-format-list-bulleted"></span> -->
  </a>
  <!-- Navbar Right Menu-->
  <ul class="app-nav">
    <!--Notification Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><span class="mdi mdi-account-plus lg"></span>&nbsp;&nbsp;<?php echo $this->session->login;?> </a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li><a class="dropdown-item" href="page-user.html"><span class="mdi mdi-account-circle"></span>Profile</a></li>
        <?php if($this->session->loggedIn === TRUE) { ?>      
        <li>
          <a class="dropdown-item" href="<?php echo base_url();?>connection/logout">
            <i class="mdi mdi-power md-80">Logout</i>
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
  </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
    <div>
      <p class="app-sidebar__user-name">Khai HOk</p>
      <p class="app-sidebar__user-designation">Frontend Developer</p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item active" href="<?php echo base_url(); ?>Users/dry_food"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dry Food</span></a></li>

    <li><a class="app-menu__item" href="<?php echo base_url(); ?>Users/water_food"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Water Food</span></a></li>

    <li><a class="app-menu__item" href="<?php echo base_url(); ?>Users/create"><span class="mdi mdi-folder-plus"></span>&nbsp;&nbsp;<span class="app-menu__label">Create Menu</span></a></li> 
  </ul> 
</aside>
