$(function(){

    var currentDate; // Holds the day clicked when adding a new event
    var currentEvent; // Holds the event object when editing an event

    // $('#color').colorpicker(); // Colopicker
    
    var base_url='http://localhost/2018-canteen/'; // Here i define the base_url

    // Fullcalendar
    $('#calendar').fullCalendar({
        header: {
            left: 'prev, next, today',
            center: 'title',
             right: 'month, basicWeek, basicDay'
        },
        // Get all events stored in database
        eventLimit: true, // allow "more" link when too many events
        events: base_url+'calendar/getDinnerEvents',
        selectHelper: true,
        editable: false, // Make the event resizable true           
            select: function(start, end) {
                
                $('#start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                    // Open modal to add event
            }, 
           
        // Event Mouseover
        eventMouseover: function(calEvent, jsEvent, view){
            var tooltip = '<div class="event-tooltip">' + calEvent.description + '</div>';
            $("body").append(tooltip);

            $(this).mouseover(function(e) {
                $(this).css('z-index', 10000);
                $('.event-tooltip').fadeIn('500');
                $('.event-tooltip').fadeTo('10', 1.9);
            }).mousemove(function(e) {
                $('.event-tooltip').css('top', e.pageY + 10);
                $('.event-tooltip').css('left', e.pageX + 20);
            });
        },
        eventMouseout: function(calEvent, jsEvent) {
            $(this).css('z-index', 8);
            $('.event-tooltip').remove();
        },
        // Handle Existing Event Click
        eventClick: function(calEvent, jsEvent, view) {
            // Set currentEvent variable according to the event clicked in the calendar
            currentEvent = calEvent;
            // Open modal to edit or delete event
            modal({
                buttons: {
                    join: {
                        id: 'join-event',
                        css: 'btn-success',
                        label: 'OK'
                    }
                },
                title: 'Event name "' + calEvent.title + '"',
                event: calEvent
            });
        }
    });

    // Prepares the modal window according to data passed
    function modal(data) {
        // Set modal title
        $('.modal-title').html(data.title);
        $('.modal-footer button:not(".btn-default")').remove();
        // Create Butttons
        $.each(data.buttons, function(index, button){
            $('.modal-footer').prepend('<button type="button" id="' 
                + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
        })
        //Show Modal
        $('#join_modal').modal('show');
    }

    // Handle click on join event Button
     $('.modal').on('click', '#join-event',  function(e){
        /*Do something to get value to database*/
            $.post(base_url+'admin/UserjoinEvent/insertUserJoinEvent', {
                start: $('#start').val(),
                end: $('#end').val()
            }, function(result){
                $('#join_modal').modal('hide');
                $('.alert').addClass('alert-success').text('You have joined event successfully.');
                // $('.alert').addClass('alert-danger').text('You have cancel event successfully.');
                $('#calendar').fullCalendar("refetchEvents");
                hide_notify();
            });
    });

    function hide_notify()
    {
        setTimeout(function() {
                    $('.alert').removeClass('alert-success').text('');
                    // $('.alert').removeClass('alert-danger').text('');
                }, 2000);
    }
});