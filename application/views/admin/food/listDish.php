<?php
/**
 * This view displays the list of users.
 * @copyright  Copyright (c) 2014-2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
 */
?>
<style>
    .dish-info{
      padding-left: 16px;
    }
    .modal-title{
    margin-left: 150px;
    }
  table{
    box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

</style>
<main class="app-content">
  <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>Manage All Dishes</h1>
            <p>This application is very useful for admin and finance to manage their needs.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/food/add_dish"><span class="mdi mdi-plus-circle" style="font-size: 20px;"></span>&nbsp;&nbsp;Add new dish</a></li>
        </ul>
  </div>
    <div class="row">
      <div class="col-md-12">
        <table id="food" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" width="100%">
          <thead class="thead-dark">
              <tr>
                  <th>Dish ID</th>
                  <th>Dish Name</th>
                  <th>Description</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($dishes as $dish):?>
                <tr>
                  <td><?php echo $dish->dish_id ?></td>
                  <td><?php echo $dish->dish_name ?></td>                 
                  <td><?php echo $dish->description ?></td>
                <!--   <td>
                    <img src="<?//php echo base_url().'assets/uploads/'.$dish->dish_image ?>" alt="image" class="img-thumbnail" style="width:10%;">
                  </td> -->
                  <td>

                      <a href="javascript:void()" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" 
                      food_name="<?php echo $dish->dish_name ?>" 
                      food_img="<?php echo base_url().'assets/images/dish_uploads/'.$dish->dish_image ?>" 
                      food_desc="<?php echo $dish->description ?>" 
                     
                      class="show_food_detail" 
                      >
                        <span class="mdi mdi-eye-outline text-success" style="font-size: 20px;"></span>
                    </a>&nbsp;&nbsp;
                    <a href="<?php echo base_url() ?>admin/food/updateDishes/<?php echo $dish->dish_id ?>" title="Edit user">
                      <i class="mdi mdi-pencil" style="font-size: 20px;"></i>
                    </a>&nbsp;&nbsp;
                    <a href="<?php echo base_url() ?>admin/food/deleteDish/<?php echo $dish->dish_id ?>" class="confirm-delete text-danger" title="Delete Dish" style="font-size: 20px;">
                      <i class="mdi mdi-delete" onclick="return confirm('Are you sure to delete this dish?')"></i>
                    </a>
                    </td>
                </tr>
       <?php endforeach ?>  
          </tbody>
        </table>
      </div>
    </div>
</main>
<!-- create modal of dish detail item -->
      <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title text-center text-info pop_food_name" id="exampleModalLabel "></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
               
              <div class="modal-body ">
                  
                   <div class="row">
                          <div class="col-md-2"></div>
                           <div class="col-md-8">
                                      <img src="" alt="image" class="img-thumbnail mx-auto d-block pop_food_img" >
                          </div>
                          <div class="col-md-2"></div>
                   </div>
                   <div class="row">
                            <div class="col-md-4"></div>
                             <div class="col-md-4">
                               <p class="text-center text-success pop_food_date"></p>
                             </div>
                           <div class="col-md-4"></div>
                   </div>
                  <div class="row dish-info">
                           <h4 class=" text-secondary "><small class="text-center pop_food_desc"></small></h4><br>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- End of modal creation -->
<link href="<?php echo base_url();?>assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    //Transform the HTML table in a fancy datatable
    $('#food').dataTable({
        stateSave: true,
        'ordering':false
    });
    $('#food').on('click', '.show_food_detail', function(e){
        // => Get the value of current attribute on the its link clicked
        var fo_name = $(this).attr('food_name');
        var fo_img = $(this).attr('food_img');
        var fo_desc = $(this).attr('food_desc');
        var fo_date = $(this).attr('food_date');

        // => After get the value then let set it into popup
          $('.pop_food_name').text(fo_name);
          $('.pop_food_img').attr('src', fo_img);
          $('.pop_food_desc').text(fo_desc);
          $('.pop_food_date').text(fo_date);
    });
});
</script>
