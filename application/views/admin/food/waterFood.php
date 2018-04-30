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
          <h1><i class="fa fa-dashboard"></i>Water Food</h1>
          <p>All best food in Passerelles Numeriques Cambodai canteen</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="#" title="Add Water food"><span class="mdi mdi-plus-circle" style="font-size: 20px;"></span>&nbsp;&nbsp;Add Water Food</a></li>
        </ul>
  </div>
  <div class="row">
        <div class="col-md-12">
          <table id="food" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th>Food ID</th>
                    <th>Food Name</th>
                    <th>Price​(real)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                  <tr>
                    <td>001</td>
                    <td>Khmer red curry</td>
                    <td>3000</td>
                    <td>
                       <a href="#" title="View food"><span class="mdi mdi-eye-outline" style="font-size: 20px;"></span></a>&nbsp;&nbsp;
                          <a href="#" title="Edit food"><i class="mdi mdi-pencil" style="font-size: 20px;"></i></a>&nbsp;&nbsp;
                          <a href="#" class="confirm-delete" title="Delete food" style="font-size: 20px;"><i class="mdi mdi-delete"></i></a>
                      </td>
                  </tr>
                  <tr>
                    <td>002</td>
                    <td>Noum Banch Chuk</td>
                    <td>2000</td>
                    <td>
                       <a href="#" title="View food"><span class="mdi mdi-eye-outline" style="font-size: 20px;"></span></a>&nbsp;&nbsp;
                          <a href="#" title="Edit user"><i class="mdi mdi-pencil" style="font-size: 20px;"></i></a>&nbsp;&nbsp;
                          <a href="#" class="confirm-delete" title="Delete user" style="font-size: 20px;"><i class="mdi mdi-delete"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>003</td>
                    <td>Tek Kreng</td>
                    <td>2000</td>
                    <td>
                       <a href="#" title="View food"><span class="mdi mdi-eye-outline" style="font-size: 20px;"></span></a>&nbsp;&nbsp;
                          <a href="#" title="Edit user"><i class="mdi mdi-pencil" style="font-size: 20px;"></i></a>&nbsp;&nbsp;
                          <a href="#" class="confirm-delete" title="Delete user" style="font-size: 20px;"><i class="mdi mdi-delete"></i></a>
                      </td>
                  </tr>
                  <tr>
                    <td>004</td>
                    <td>Korko Soup</td>
                    <td>3000</td>
                    <td>
                       <a href="#" title="View food"><span class="mdi mdi-eye-outline" style="font-size: 20px;"></span></a>&nbsp;&nbsp;
                          <a href="#" title="Edit user"><i class="mdi mdi-pencil" style="font-size: 20px;"></i></a>&nbsp;&nbsp;
                          <a href="#" class="confirm-delete" title="Delete user" style="font-size: 20px;"><i class="mdi mdi-delete"></i></a>
                      </td>
                  </tr>
                  <tr>
                    <td>005</td>
                    <td>Mchu Trokoun</td>
                    <td>4000</td>
                    <td>
                       <a href="#" title="View food"><span class="mdi mdi-eye-outline" style="font-size: 20px;"></span></a>&nbsp;&nbsp;
                          <a href="#" title="Edit user"><i class="mdi mdi-pencil" style="font-size: 20px;"></i></a>&nbsp;&nbsp;
                          <a href="#" class="confirm-delete" title="Delete user" style="font-size: 20px;"><i class="mdi mdi-delete"></i></a>
                      </td>
                  </tr>
            </tbody>
            <thead class="thead-dark">
                <tr>
                    <th>Food ID</th>
                    <th>Food Name</th>
                    <th>Price​(real)</th>
                    <th>Action</th>
                </tr>
            </thead>
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