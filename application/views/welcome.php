
   <style>
   .sidenav {
    height: 100%;
    /*width: 200px;*/
    position: fixed;
    z-index: 1;
    top: 40px;
    left: 0;
    overflow-x: hidden;
    padding-top: 20px;
    border-right:solid #DBE9F4 0.5px;
    background-color: #0d47a1 ;
 }

 .sidenav a {
     padding: 6px 8px 6px 16px;
     text-decoration: none;
     font-size: 16px;
     color: #fff;
     display: block;
 }

 .sidenav a:hover {
     color: blue;
 }

 .main {
     font-size: 18px; / Increased text to enable scrolling /
 }

 /*sidena2*/
  .sidenav2 {
     height: 100%;
   /*  width: 200px;*/
     position: fixed;
     z-index: 1;
     top: 40px;
     right: 0;
     color: black;
     overflow-x: hidden;
     padding-top: 20px;
     border-left:solid #DBE9F4 0.5px;
     background-color: #eceff1 ;
  }

 .sidenav2 a {
     padding: 6px 8px 6px 16px;
     text-decoration: none;
     font-size: 14px;
     color: purple;
     display: block;
 }

 .sidenav2 a:hover {
     color: #f1f1f1;
 }
 li{
  text-decoration:none;
  list-style-type: none;
 }
 .row a:hover {
  text-decoration:none;
  color:blue;
 }
 
 img{
  width: 249px;
  height: 200px;
  float: left;
  padding: 10px;
 }
.material-icons{
    display: inline-flex;
    vertical-align: top;
}
</style>




 <div class="container">
  <div class="row">
   <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12 nav fixed">
    <div class="sidenav">
      <a href="#about"><i class="mdi mdi-rice"></i>&nbsp; Try foot</a>
      <a href="#about"><i class="mdi mdi-rice"></i>&nbsp; Water food</a>
      <a href="#about"><i class="mdi mdi-rice"></i>&nbsp;  Other</a>
    </div>
   </div>
  
   <div class="col-lg-6 col-md-6  col-sm-6 col-xs-12">  
      <br>
      <i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i><span>&nbsp; Canteen Owner</span>
      <p>Hello everyone today I have a nice food for all of you, hurry up come and help to buy our food, I have listed two kind of Humbergers. If you like or unlike please don't herritage to leave the comment. I am waiting for your feedback.</p>
    
     <div class="card">
        <!-- <div class="card-header">Header</div> -->
        <div class="card-body">
         <img src="<?php echo base_url();  ?>assets/images/food-wallpaper-high-quality-For-Desktop-Wallpaper.jpg" alt="">
     <img src="<?php echo base_url();  ?>assets/images/fast-food.jpg" alt="">
        </div> 
        <div class="card-footer">
         <div class="container">
          <div class="row">
           <div class="col-md-4"><a href="#" class="text-secondary"><i class="mdi mdi-thumb-up"></i>&nbsp; Interest</a></div>
           <div class="col-md-4"><a href="#" class="text-secondary"><i class="mdi mdi-rice"></i>&nbsp; Order</a></div>
           <div class="col-md-4"><a href="#" class="text-secondary"><i class="mdi mdi-comment"></i>&nbsp; Recomment</a></div>
          </div>
         </div>
         
        </div>
     </div>
     <br>
       <div class="user-comment" style="margin-left: 80px;">
          <i style="margin-left:-10px; color:blue;" class="mdi mdi-account-circle">Kimseong Kao</i><p>I don't like kind of these foods. </p>
          
          <i style="margin-left:-10px; color:blue;" class="mdi mdi-account-circle">Canteen Owner</i><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat repudiandae laudantium pariatur consequatur officia incidunt, dolore architecto eaque, </p>

        </div>
        <div class="manage-comment">
         <i style="margin-left:-10px; color:purple;" class="mdi mdi-account-circle"></i><span>&nbsp; Canteen Owner</span><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem corporis nihil, illo error eos suscipit placeat sed consequuntur aliquam,</p>
      
        </div>
   </div>

   <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
    <div class="sidenav2">
     <ul>
      <li>
       <i style="margin-left:-30px;" class="mdi mdi-account-multiple"></i> <span>&nbsp; User login now</span>
       
      </li>
      <li>
        <i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Davy</span>
      </li>
      <li>
        <i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Chantha</span>
      </li>
      <li>
        <i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Khai</span>
      </li>
      <li>
        <i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Kemseong</span>
      </li>
      <li>
        <i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Sun</span>
      </li>
     </ul>
    </div>
   </div>
  </div>
 </div>