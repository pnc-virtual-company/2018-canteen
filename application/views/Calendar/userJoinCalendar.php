<?php
/**
 * this view display the popup to confirm the staff join the student events
 * @author  Copyright (c) 2014-2018 sun meas
 */
?> 
 <link href='<?php echo base_url();?>assets/css/fullcalendar.css' rel='stylesheet' />
 <!-- Custom css  -->
 <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-4.0.0/css/bootstrap.min.css">

 <script src='<?php echo base_url();?>assets/js/moment.min.js'></script>
 <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>
 <script src="<?php echo base_url();?>assets/js/bootstrapValidator.min.js"></script>
 <script src="<?php echo base_url();?>assets/js/fullcalendar.min.js"></script>
 <script src='<?php echo base_url();?>assets/js/bootstrap-colorpicker.min.js'></script>
 <script src='<?php echo base_url();?>assets/js/userCalendarMain.js'></script>
 
 <div class="container">
    <div class="col-md-12 column"><br><br><br><br>
      <div class="alert"></div>
      <div id='calendar'></div>
    </div>
</div>

<!-- Alert message to ask if user want to join -->
<div class="modal fade" id="join_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <h3 id="exampleModalLabel">Are you sure want to join this event?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default"   data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<!-- Alert message to ask if user want to cancel -->
<div class="modal hide fade" id="cancel_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <h4 id="exampleModalLabel">Are you sure want to cancel this event?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
