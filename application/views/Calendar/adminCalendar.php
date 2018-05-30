<?php
/**
 * This view display popup to create new staff lunch event
 * @author  Copyright (c) 2017-2018 sun meas
 */
?>
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href='<?php echo base_url();?>assets/css/fullcalendar.css' rel='stylesheet' />
<link href="<?php echo base_url();?>assets/css/bootstrapValidator.min.css" rel="stylesheet" />        
<link href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
        <!-- Custom css  -->
<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />

<script src='<?php echo base_url();?>assets/js/moment.min.js'></script>
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrapValidator.min.js"></script>
<script src="<?php echo base_url();?>assets/js/fullcalendar.min.js"></script>
<script src='<?php echo base_url();?>assets/js/bootstrap-colorpicker.min.js'></script>
<script src='<?php echo base_url();?>assets/js/adminCalendarMain.js'></script>
  <br>
    <main class="app-content"  style="background:white;"> 
        <div class="app-title">
          <div>
              <h1><i class="fa fa-dashboard"></i>Create Staff lunch</h1>
              <p>This application is very useful for admin and finance to manage their needs.</p>
            </div>
        </div >
        <!-- alert message -->
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="alert"></div>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div id='calendar'></div>
          </div>
        </div>
   </main>        
    <!-- </div> -->
<div class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          </div>
          <div class="modal-body"><br>    
            <div class="error"></div>
          <form class="form-horizontal" id="crud-form" >
            <input type="hidden" id="start">
            <input type="hidden" id="end">
              <div class="form-group">
                  <label class="col-md-4 control-label" for="title">Event Title</label>
                  <div class="col-md-6">
                    <input id="title" name="title" type="text" class="form-control input-md" />
                  </div>
              </div>   
              <div class="form-group">
                <label class="col-md-4 control-label" for="description">Email Content</label>
                <div class="col-md-6">
                    <textarea class="form-control" id="description" name="description"></textarea>
                    <span class="help-block">Email send automatically to staffs.</span>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="color">Event Color</label>
              <div class="col-md-6">
                  <input id="color" name="color" type="text" class="form-control input-md" readonly="readonly" />
                  <span class="help-block">Click to pick the presentative color</span>
              </div>
          </div>

      </form>
          </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>

      </div>
      </div>

</div>

