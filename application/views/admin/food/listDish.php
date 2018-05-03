<?php
/**
 * This view displays the list of users.
 * @copyright  Copyright (c) 2014-2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
 */
?>
<main class="app-content">
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Manage All Dishes</h1>
          <p>All best food in Passerelles Numeriques Cambodai canteen</p>
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
                  <!-- <th>image</th>  -->
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
                    <img src="<?php echo base_url().'assets/uploads/'.$dish->dish_image ?>" alt="image" class="img-thumbnail" style="width:10%;">
                  </td> -->
                  <td>
                    <a href="<?php echo base_url() ?>admin/food/viewDishDetail/<?php echo $dish->dish_id ?>" title="View food">
                      <span class="mdi mdi-eye-outline text-success" style="font-size: 20px;"></span>
                    </a>&nbsp;&nbsp;
                    <a href="<?php echo base_url() ?>admin/food/updateDish/<?php echo $dish->dish_id ?>" title="Edit user">
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


<link href="<?php echo base_url();?>assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    //Transform the HTML table in a fancy datatable
    $('#food').dataTable({
        stateSave: true,
    });

});
</script>
