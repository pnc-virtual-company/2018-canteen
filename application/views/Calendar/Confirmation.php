<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="alert"></div>
    </div>
    <div class="col-md-2"></div>
  </div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
  <div class="card">
    <div class="card-header">
      Staff Lunch Invitation
    </div>
    <div class="card-body">
      <h5 class="card-title">Are you sure want to confirm this invitation?</h5>
      <p class="card-text">Please confirm the invitation to participate the staff monthly lunch, so your participation is more important to make the event more enjoyable. Click confirm to attend the event.</p>
    </div>
    <div class="card-footer">
      <a href="#" class="btn btn-primary clickConfirm">Confirm Now</a>
    </div>
  </div>
    </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
   /*alert success reminding email*/
   $(".clickConfirm").click(function() {
    $('.alert').addClass('alert-success').text('You have confirmed invitation successfully.');
    $.ajax({    
      url:"<?php echo base_url() ?>Welcome/ConfirmReminded",  
      success: function() {
        // $('.container').hide();
      }
    });
  });
 });
</script> 


