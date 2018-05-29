 <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-4.0.0/css/bootstrap.min.css">
  <br>
<div class="container"><br><br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            Best Regard
        </div>
    </div><br><br>
    <div class="row">
	<h4>Confirm the invitation now?</h4>
	<div class="col-md-2"></div>
		<div class="col-md-10">
      <a href="http://kratie/2018vc2ge/welcome/ConfirmReminded"><button type="submit" class="btn btn-success clickRemind" id="">Confirm Now</button></a>&nbsp;&nbsp;&nbsp;
      <a href=""><button type="submit" class="btn btn-info" id="">No</button></a>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10">
            <h4>Sorry for some annoying email notification, this is just for Testing Application.</h4>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {

     /*alert success reminding email*/
      $(".clickRemind").click(function() {
        $.ajax({    
            url:"<?php echo base_url() ?>admin/StaffParticipation/sendReminded",  
            success: function() {
            }
        });
     });
});
</script>




