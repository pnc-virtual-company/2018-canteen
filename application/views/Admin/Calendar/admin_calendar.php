<div class="app-content">
<!--     <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Create Staff Event</h1>
          <p>This application is very useful for admin and finance to manage their needs.</p>
        </div>
  </div> -->
<!-- create modal of order item -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Please Leave your event information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form  action="<?php echo base_url();?>calendar/addEvent" class="form-horizontal" method="post">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label class="col-form-label text-bold">Event Title:</label>
                      <input type="text" class="form-control" id="event_title" placeholder="Event title..." >
                    </div>
                  </div>
                    
                  </div>
                  <div class="row">
                  <div class="col-12">
                     <div class="form-group">
                      <label class="col-form-label">Email Content:</label>
                      <textarea type="text" class="form-control" id="content_email" rows="4" cols="50" placeholder="Email Content..."></textarea> 
                    </div> 
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Add Event</button>
            </div>
          </div>
        </div>
      </div>
<!-- End of modal creation -->
<script type="text/javascript">
$(document).ready(function() {
  $('.datepicker').datepicker({
    orientation:"bottom",
    todayBtn: true,
    todayHighlight: true,
    autoclose:true,
  });
});
</script>
<script>
  $(document).ready(function() {

         $('#calendar').fullCalendar({
             header: {
                 left: 'prev,next today',
                 center: 'title',
                 right: 'month,agendaWeek,agendaDay'
             },
             defaultDate: '2016-09-12',
             navLinks: true, // can click day/week names to navigate views
             selectable: true,
             selectHelper: true,
             select: function(start, end) {
                 // Display the modal.
                 // You could fill in the start and end fields based on the parameters
                 $('.modal').modal('show');

             },
             eventClick: function(event, element) {
                 // Display the modal and set the values to the event values.
                 $('.modal').modal('show');
                 $('.modal').find('#title').val(event.title);
                 $('.modal').find('#starts-at').val(event.start);
                 $('.modal').find('#ends-at').val(event.end);

             },
             editable: true,
             eventLimit: true // allow "more" link when too many events

         });

         // Bind the dates to datetimepicker.
         // You should pass the options you need
         $("#starts-at, #ends-at").datetimepicker();

         // Whenever the user clicks on the "save" button om the dialog
         $('#save-event').on('click', function() {
             var title = $('#title').val();
             if (title) {
                 var eventData = {
                     title: title,
                     start: $('#starts-at').val(),
                     end: $('#ends-at').val()
                 };
                 $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
             }
             $('#calendar').fullCalendar('unselect');

             // Clear modal inputs
             $('.modal').find('input').val('');

             // hide modal
             $('.modal').modal('hide');
         });
     });
</script>
</div>
