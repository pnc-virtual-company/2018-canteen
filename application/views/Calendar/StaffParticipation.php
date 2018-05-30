<?php
/**
 * List all users that participated to the event & doing remind sending email to  unconfirmed user to participate
 * @return int number of affected rows
 * @author sun MEAS <sun.meas@gmail.com>
 */
?>
<style>
  table{
    box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
   .dish-info{
      padding-left: 16px;
    }
    .modal-title{
    margin-left: 150px;
    }

  table{
    box-shadow: 2px 2px 2px gray;
  }
  .clearfix {
    hieght: 10px;
    clear:both;
  }
 /* input[type="checkbox"] {
    width: 20px;
    height: 20px;
}*/
</style>
<main class="app-content">
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Statff Lunch Participant</h1>
          <p>This application is very useful for admin and finance to manage their needs.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url() ?>calendar/getAdminCalendar"><span class="mdi mdi-plus-circle" style="font-size: 20px;"></span>&nbsp;&nbsp;Add new Event</a></li>
        </ul>
  </div>
        <div class="row">
                <div class="col-md-12">
                        <div class="alert"></div>
                </div>
        </div>
<?php if($this->session->loggedIn === TRUE) { ?>
  <div class="col-md-3 col-sm-0 col-xs-0"></div>
     <div class="col-md-1">
       <label for="exampleSelect1"><strong>Status:</strong></label>
     </div>
     <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="form-group">
        <select class="form-control" onchange="location = this.value;">
          <option value="<?php echo base_url() ?>admin/StaffParticipation/getListParticipate/2" 
              <?php if ($statusId == 2) {echo "selected";}?> >All
          </option>
          <option value="<?php echo base_url() ?>admin/StaffParticipation/getListParticipate/1" <?php if ($statusId == 1) {echo "selected";}?> > Confirmed
          </option>
          <option value="<?php echo base_url() ?>admin/StaffParticipation/getListParticipate/0"
             <?php if ($statusId == 0) {echo "selected";}?> >Not yet confirm</option>
        </select>
    </div>
  </div>
  <div class="col-md-1 col-sm-0 col-xs-12"></div>
    <div class="row">
      <div class="col-md-12">
        <table id="user" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" width="100%">
          <thead class="bg-dark text-white">
              <tr>
                  <th>Staff ID</th>
                  <th>Staff Name</th>
                  <th>Position</th>
                  <th>Email</th>
                  <th>Lunch Event</th>
                  <th>Status</th> 
                  <th>Selection</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($userParticipate as $participates):?> 
                <tr>
                  <td><?php echo $participates->id ?></td>
                  <td><?php echo $participates->Staff_name ?></td>
                  <td><?php echo $participates->ClassName ?></td>
                  <td><a href="#"><?php echo $participates->Email ?><a href='#'></a></td>
                  <td><?php echo $participates->Title ?></td>
                  <td><?php if ($participates->status ==0  &&  $participates->reminded ==0 ) 
                  {
                          echo "<mark class='badge btn-warning' >Not yet Confirmed</mark>";
                  } else if ($participates->status ==1 && $participates->reminded ==0 ) 
                  {
                          echo "<mark class='badge btn-success' >Confirmed</mark>";
                  }else if($participates->status ==0 && $participates->reminded ==1){
                          echo "<mark class='badge btn-warning' >Not yet Confirmed</mark>";
                  }else if($participates->status ==1 && $participates->reminded ==1){
                          echo "<mark class='badge btn-success' >Confirmed</mark>";
                  }?></td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#" title="Click to Remind">
                  <?php if ($participates->status ==0  &&  $participates->reminded ==0  ) 
                  {
                    echo "<label class='checkbox-inline'><input type='checkbox' name='check' class='clickUser'id=' ".$participates->user_id." '></label>";
                  } else if($participates->status ==1 && $participates->reminded ==0)
                  {
                          echo "<mark class='badge btn-primary' >Attended</mark>";
                  }else if($participates->status ==0 && $participates->reminded ==1){
                          echo "<mark class='badge btn-primary' >Reminded</mark>";
                  }?>
                    </a>
                    </td>
                </tr>
          </tbody>
            <?php endforeach ?>
        </table>
        <div class="row">
          <div class="col-md-12">
            <a href=""><button type="submit" class="btn btn-warning clickRemind" id="<?php echo $participates->user_id?>" disabled="disabled" ><span class="btn-label btn-label-right"><i class="mdi mdi-gmail" aria-hidden="true"></i></span>&nbsp;&nbsp;Remind Email</button></a>
          </div>
        </div>
      </div>
    </div>
<?php } ?>
</main>

<link href="<?php echo base_url();?>assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    //Transform the HTML table in a fancy datatable
    $('#user').dataTable({
        stateSave: true,
    });

    // Determine if checkbox is checked enable button
     $(".clickUser").click(function() {
            if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
                   $(".btn-warning").attr("disabled", !this.check); 
            }else {
                   $(".btn-warning").attr("disabled", !this.checked); 
            }
     });
     /*alert success reminding email*/
      $(".clickRemind").click(function() {
                $('.alert').addClass('alert-success').text('You have sent email remind successfully.');
        $.ajax({    
            url:"<?php echo base_url() ?>admin/remindEmail",  
            success: function() {
            }
        });

     });

});
</script>



