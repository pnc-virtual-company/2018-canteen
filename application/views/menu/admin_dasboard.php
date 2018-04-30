
<header class="app-header">
  <a class="app-header__logo" href="index.html">Canteen MS</a>
  <!-- Sidebar toggle button-->
  <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar">
   <!--  <span class="mdi mdi-format-list-bulleted"></span> -->
  </a>
  <!-- Navbar Right Menu-->
  <ul class="app-nav">
    <!--Notification Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><span class="mdi mdi-account-plus lg" style="font-size: 20px;"></span>&nbsp;&nbsp;<?php echo $this->session->login;?> </a>
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
      <p class="app-sidebar__user-designation">User login</p>
      <p class="app-sidebar__user-name">&nbsp;&nbsp;<?php echo $this->session->login;?></p>
    </div>
  </div>
  <ul class="app-menu" id="nav">
    <li><a class="app-menu__item" href="<?php echo base_url(); ?>admin/food/dryFood"><span class="mdi mdi-bowl" style="font-size: 20px;"></span>&nbsp;&nbsp;<span class="app-menu__label">Dry Food</span></a></li>
    <li><a class="app-menu__item" href="<?php echo base_url(); ?>admin/food/waterFood"><span class="mdi mdi-bowl" style="font-size: 20px;"></span>&nbsp;&nbsp;<span class="app-menu__label">Water Food</span></a></li>

    <li><a class="app-menu__item" href="<?php echo base_url(); ?>calender/getCalender"><span class="mdi mdi-folder-plus" style="font-size: 20px;"></span>&nbsp;&nbsp;<span class="app-menu__label">Create Menu</span></a></li>

    <li><a class="app-menu__item" href="<?php echo base_url(); ?>admin/food/favouriteFood"><span class="mdi mdi-folder-plus" style="font-size: 20px;"></span>&nbsp;&nbsp;<span class="app-menu__label">Favorit Food</span></a></li>

    <li><a class="app-menu__item" href="<?php echo base_url(); ?>"><span class="mdi mdi-folder-plus" style="font-size: 20px;"></span>&nbsp;&nbsp;<span class="app-menu__label">Staff Event</span></a></li> 

    <li><a class="app-menu__item" href="<?php echo base_url(); ?>"><span class="mdi mdi-folder-plus" style="font-size: 20px;"></span>&nbsp;&nbsp;<span class="app-menu__label">Staff Register</span></a></li> 

    <li><a class="app-menu__item" href="<?php echo base_url(); ?>"><span class="mdi mdi-folder-plus" style="font-size: 20px;"></span>&nbsp;&nbsp;<span class="app-menu__label">Week and Month dinnner</span></a></li>      
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

</script>

<script>
    for (var i = 0; i < document.links.length; i++) {
        if (document.links[i].href == document.URL) {
            document.links[i].className = 'active';
        }
    }
</script>



