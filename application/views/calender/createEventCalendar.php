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
      left:'prev,next today',
      center:'title',
      right: 'month,basicWeek,basicDay'
    },
    /*themeSystem: 'bootstrap3',*/
    defaultDate: '2017-11-12',
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    events: [
      {
        title: 'CETC Party',
        start: '2017-11-01'
      },
      {
        id: 999,
        title: 'CETC Party',
        start: '2017-11-08'
      },
      {
        id: 999,
        title: 'CETC Party',
        start: '2017-11-15'
      },
      {
        title: 'CETC Party',
        start: '2017-11-22'
      },
      {
        title: 'CETC Party',
        start: '2017-11-29'
      },
      {
        title: 'PNC Party',
        start: '2017-11-30'
      }
    ]
  });

});
</script>
</div>
</div>