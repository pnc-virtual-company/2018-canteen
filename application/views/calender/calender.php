<!--Note that FullCalendar needs MomentJS to work //-->
<link rel="stylesheet" href="<?php echo base_url();?>assets/fullcalendar-3.8.2/fullcalendar.min.css">
<script src="<?php echo base_url();?>assets/js/moment-with-locales-2.19.3.min.js"></script>
<script src="<?php echo base_url();?>assets/fullcalendar-3.8.2/fullcalendar.min.js"></script>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-8">



<h1>FullCalendar widget</h1>
<p>FullCalendar is a widget allowing to display calendar and agenda views. Please visit their website for more information:
  <a target="_blank" href="https://fullcalendar.io/">https://fullcalendar.io/</a></p>

<div id='calendar'></div>

<!-- Live example of usage //-->
<script type="text/javascript">
$(document).ready(function() {

  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,basicWeek,basicDay'
    },
    /*themeSystem: 'bootstrap3',*/
    defaultDate: '2017-11-12',
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    events: [
      {
        title: 'All Day Event',
        start: '2017-11-01'
      },
      {
        title: 'Long Event',
        start: '2017-11-07',
        end: '2017-11-10'
      },
      {
        id: 999,
        title: 'Repeating Event',
        start: '2017-11-09T16:00:00'
      },
      {
        id: 999,
        title: 'Repeating Event',
        start: '2017-11-16T16:00:00'
      },
      {
        title: 'Conference',
        start: '2017-11-11',
        end: '2017-11-13'
      },
      {
        title: 'Meeting',
        start: '2017-11-12T10:30:00',
        end: '2017-11-12T12:30:00'
      },
      {
        title: 'Lunch',
        start: '2017-11-12T12:00:00'
      },
      {
        title: 'Meeting',
        start: '2017-11-12T14:30:00'
      },
      {
        title: 'Happy Hour',
        start: '2017-11-12T17:30:00'
      },
      {
        title: 'Dinner',
        start: '2017-11-12T20:00:00'
      },
      {
        title: 'Birthday Party',
        start: '2017-11-13T07:00:00'
      },
      {
        title: 'Click for Google',
        url: 'http://google.com/',
        start: '2017-11-28'
      }
    ]
  });

});
</script>
<!-- create modal of order item -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Please Leave your order information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Start Date:</label>
                <input type="date" class="form-control" id="recipient-name"  >
              </div>
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">End date:</label>
                <input type="date" class="form-control" id="recipient-name" >
              </div> 
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Food Time:</label>
               <select name="foodTime" class="form-control" id="recipient-name" >
                <?php 
                  $foodTimes  = array('---Select One---','Breakfast', 'Lunch ', 'Dinner');
                foreach ($foodTimes as  $value) {
                  echo "<option>".$value."</option>";
                  }
                ?>
               </select>  
              </div>
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Plate:</label>
               <select name="plate" class="form-control" id="recipient-name" >
                <?php 
                  $plates  = array('---Select plate---','1', '2', '3 ', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24' ,'25');
                foreach ($plates as  $value) {
                  echo "<option>".$value."</option>";
                  }
                ?>
               </select>  
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">Order Now</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End of modal creation -->
</div>
</div>