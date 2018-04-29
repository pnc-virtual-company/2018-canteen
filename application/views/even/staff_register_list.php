<style>
	.row{
		margin-top:30px;
	}
</style>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-4">
		<select name="" id="">
			<option value="" selected >Choose even time</option>
			<option value="">Weekly dinner</option>
			<option value="">Monthly dinner</option>
		</select>
	</div>
</div>
	

.
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<table id="example" class="table table-striped table-bordered table-hover">
				        <thead class="bg-secondary text-white">
				            <tr>
				                <th>Staff Name</th>
				                <th>Department Name</th>
				                <th>Position</th>
				                <th>Action</th>
				                
				            </tr>
				        </thead>
				
				        <tbody>
				            <tr>
				                <td>Rady</td>
				                <td>Training team</td>
				                <td>Web trainer</td>
				                <td>Registered</td>
				               
				            </tr>
				             <tr>
				                <td>Sopheak Huy</td>
				                <td>Training team</td>
				                <td>English trainer</td>
				                <td>Registered</td>
				               
				            </tr>
				             <tr>
				                <td>Rith Nhel</td>
				                <td>Training team</td>
				                <td>Web trainer</td>
				                <td>Registered</td>
				               
				            </tr>
				          
				        </tbody>
				    </table>
			</div>
		</div>
	
<link href="<?php echo base_url();?>assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
      $(function () {
        $('#datetimepicker1').datetimepicker();
      });
  </script>
	<script src="js/jquery.dataTables.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/bootstrap-datetimepicker.min.js"></script>
	<script src="index.js"></script>
	
</body>
</html>

</div>