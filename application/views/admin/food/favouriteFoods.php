<script src="<?php echo base_url();?>assets/js/Chart-2.7.1.min.js"></script>
<div class="app-content">
    <!-- <img src="<?php echo base_url() ?>assets/images/coming-soon.png" alt="" style="width:70%"> -->
    <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Bar chart of favourite food</h1>
          <p>This application is very useful for admin and finance to manage their needs.</p>
        </div>
  </div>
<!-- We just need a JS file // -->
<br>
<h1 class="text-info text-center">List All Favourite Food</h1>
<div class="row">
  <div class="col-md-2"></div>
      <div class="col-lg-8 col-md-6  col-sm-6 col-xs-12"> 
      <canvas id="pie-chart" width="800" height="450"></canvas>
      </div>
  <div class="col-md-2"></div>
</div>
<script type="text/javascript">
new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["Bai sach chrouk", "Fish amok", "Khmer red curry", "Lap Khmer", "Nom banh chok"],
      datasets: [{
        label: "favorite food",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [10,70,15,13,30]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Predicted favorite food in 2018-2019'
      }
    }
});
</script>
</div>