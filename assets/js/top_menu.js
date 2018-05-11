
// Add active class to the current button (highlight it)
        $(document).ready(function(){
           $('ul li a').click(function(){
              $(' li a').removeClass("active");
              $(this).addClass("active");
             });
          });

