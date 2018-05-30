<?php
/**
 * This view displays the chart of favorit food.
 * @copyright  Copyright (c) 2017-2018 khai hok
 * @since      1.0.0
 */
?>
<script src="<?php echo base_url();?>assets/js/Chart-2.7.1.min.js"></script>
<div style="margin-top: 50px;">
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0"></div>
    <div class="col-lg-8 col-md-8  col-sm-12 col-xs-12">
      <h2 style="color: #009688; text-align: center;"><u>Favorite Dishes</u></h2>
      <canvas id="pie-chart"></canvas>
      <script type="text/javascript">
        new Chart(document.getElementById("pie-chart"), {
          type: 'pie',
          data: {
            labels: [
            <?php 
            foreach($dishes as $row)
            { 
              echo "'".$row->dish_name."',";
            }
            ?>
            ],
            datasets: [{
              label: "Population (millions)",
              backgroundColor: ["#03D5C1","#c45850","black","#7FFF00"," #00FFFF","#4B0082","#FF00AF","#CC7722","#808000","#FF4500","#8E4585","#C0C0C0","#FF2400","#92000A","#0095B6","#DE5D83","  #CD7F32","#964B00","#800020","#702963","#DE3163","#007BA7","#F7E7CE","#7FFF00","#0047AB","#F88379","#DC143C","#00FFFF","#EDC9AF","#50C878","#FFD700","#808080","gold","gray","white","#F78803","#FF1607","#73DD02","brown","#03D5C1","#c45850","#7FFF00"," #00FFFF","#4B0082","#FF00AF","#CC7722","#808000","#FF4500","#8E4585","#C0C0C0","#FF2400","#92000A","#0095B6","#DE5D83","  #CD7F32","#964B00","#800020","#702963","#DE3163","#007BA7","#F7E7CE","#7FFF00","#0047AB","#F88379","#DC143C","#00FFFF","#EDC9AF","#50C878","#FFD700","#808080"],
              data: [
              <?php 
              foreach($dishes as $row)
              { 
                echo $row->interest.",";
              }
              ?>
              ]
            }]
          },
        });
      </script>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0"></div>
  </div>
</div>