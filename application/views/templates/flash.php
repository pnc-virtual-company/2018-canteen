<?php
/**
 * This partial view is included into views when we want to display a flash message.
 * @copyright  Copyright (c) 2018 kimsoeng kso
 */
?>
<?php if($this->session->flashdata('msg')){ ?>
<div id="flashbox" class="alert alert-primary" role="alert">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo $this->session->flashdata('msg'); ?>
</div>

<script type="text/javascript">
//Flash message
$(document).ready(function() {
    $("#flashbox").fadeIn().delay(4000).fadeOut('slow');
});
</script>
<?php } ?>
