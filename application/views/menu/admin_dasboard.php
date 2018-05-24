<style>
  .app-sidebar__toggle:before {
    content: "";
  }
  li>a:hover {
    text-decoration: none;
    color:#17a2b8;
  }
</style>

<header class="app-header">
  <a class="app-header__logo" href="#">Canteen MS</a>
  <!-- Sidebar toggle button-->
  &nbsp;&nbsp;<a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><span class="mdi mdi-format-list-bulleted" style="color: white; font-size: 28px;"></span>
  </a>
  <a href="<?php echo base_url() ?>" class="text-white app-sidebar__toggle" style="font-size: 25px;" title="Go to public user interface" data-toggle="tooltip" data-placement="right"><span class="mdi mdi-arrow-left-bold-circle-outline text-white"></span>&nbsp;&nbsp;</a>
  <!-- Navbar Right Menu-->
  &nbsp;&nbsp;<ul class="app-nav">
    <!--Notification Menu-->
    <li class="dropdown"><a style="color: white" class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><span class="mdi mdi-settings" style="font-size: 20px;"></span>&nbsp;&nbsp;<?php echo  strtoupper($this->session->login);?> </a>
      
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li><a class="dropdown-item text-info" href="#"><span class="mdi mdi-account-edit"></span>&nbsp;&nbsp;Profile</a></li>
        <?php if($this->session->loggedIn === TRUE) { ?>      
        <li>
          <a class="dropdown-item text-danger" href="<?php echo base_url();?>connection/logout">
            <i class="mdi mdi-power md-80 ">&nbsp;&nbsp;&nbsp;&nbsp;</i>Logout
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
  <div class="app-sidebar__user app-menu__label">
    <a href="<?php echo base_url() ?>Dishes"><img class="" style="width: 40%; margin-left: 22%; margin-bottom: -10%;" src="<?php echo base_url();?>assets/images/pnc-canteenEnd.png" alt="User Image"></a>
  </div>
  <ul class="app-menu" id="nav">
    <li class="treeview">
      <a class="app-menu__item" href="<?php echo base_url()?>Dishes"></i><span class="mdi mdi-view-dashboard" style="font-size: 20px;"></span>&nbsp;&nbsp;&nbsp;Dashboard</a>
    </li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"></i><span class=" mdi mdi-food" style="font-size: 20px;"></span>&nbsp;&nbsp;&nbsp;Canteen
    <span class="mdi mdi-arrow-down-drop-circle-outline" style="font-size: 20px;margin-left: 40%;"></span>
    </a>
      <ul class="treeview-menu">
        <li>
          <a class="app-menu__item" href="<?php echo base_url(); ?>admin/food/listDish">
            <span class="mdi mdi-circle-outline" style="font-size: 12px;">&nbsp;&nbsp;&nbsp;</span>Dishes
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="<?php echo base_url(); ?>admin/create_menu">
            <span class="mdi mdi-circle-outline" style="font-size: 12px;">&nbsp;&nbsp;&nbsp;</span>Create Menu
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="<?php echo base_url() ?>admin/PreOrder/preOrderList">
            <span class="mdi mdi-circle-outline" style="font-size: 12px;">&nbsp;&nbsp;&nbsp;</span>Pre-Ordered
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="<?php echo base_url() ?>admin/PreOrder/userOrderList">
            <span class="mdi mdi-circle-outline" style="font-size: 12px;">&nbsp;&nbsp;&nbsp;</span>User Pre-Ordered
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="<?php echo base_url(); ?>admin/food/favouriteFood">
            <span class="mdi mdi-circle-outline" style="font-size: 12px;">&nbsp;&nbsp;&nbsp;</span>Favorite Dishes
          </a>
        </li>
      </ul>
    </li>
    <?php if ($this->session->isSuperAdmin) { ?>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"></i><span class="mdi mdi-calendar" style="font-size: 20px;"></span>&nbsp;&nbsp;&nbsp;Events<span class="mdi mdi-arrow-down-drop-circle-outline" style="font-size: 20px;margin-left: 45%;"></span></a>
      <ul class="treeview-menu">
        <li>
          <a class="app-menu__item" href="<?php echo base_url(); ?>calendar/getAdminCalendar">
            <span class="mdi mdi-circle-outline" style="font-size: 12px;">&nbsp;&nbsp;&nbsp;</span>Staff Lunch
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="<?php echo base_url(); ?>admin/StaffParticipation/getListParticipate">
            <span class="mdi mdi-circle-outline" style="font-size: 12px;">&nbsp;&nbsp;&nbsp;</span>Staff Lunch Reminder
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="<?php echo base_url(); ?>calendar/getDinnerEvent">
            <span class="mdi mdi-circle-outline" style="font-size: 12px;">&nbsp;&nbsp;&nbsp;</span>Student Event & Report
          </a>
        </li>
      </ul>
    </li>
    <li class="treeview">
      <a class="app-menu__item" href="<?php echo base_url()?>admin/User/listUsers"></i><span class="mdi mdi-account-multiple" style="font-size: 20px;"></span>&nbsp;&nbsp;&nbsp;Users</a>
    </li>
    <?php } ?>
  </ul> 
</aside>

<!-- responsive menu -->
<script>
  
  (function () {
   "use strict";

   var treeviewMenu = $('.app-menu');

         // Toggle Sidebar
         $('[data-toggle="sidebar"]').click(function(event) {
          event.preventDefault();
          $('.app').toggleClass('sidenav-toggled');
        });
         // Activate sidebar treeview toggle
         $("[data-toggle='treeview']").click(function(event) {
          event.preventDefault();
          if(!$(this).parent().hasClass('is-expanded')) {
           treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
         }
         $(this).parent().toggleClass('is-expanded');
       });

         // Set initial active toggle
         $("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

         //Activate bootstrip tooltips
         $("[data-toggle='tooltip']").tooltip();

       })();

    for (var i = 0; i < document.links.length; i++) {
        if (document.links[i].href == document.URL) {
            document.links[i].className = 'active';
        }
    }
</script>



