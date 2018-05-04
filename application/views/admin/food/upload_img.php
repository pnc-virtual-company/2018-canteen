</form>
<form action="<?php echo base_url(); ?>admin/upload/do_upload" method="post" enctype="multipart/form-data">
			Dish name: <input type="text" name="dish_name" /> 
			<br />
			Photo: <input type="file" name="dish_image">
			<br />
			<input type="submit" value="Add" />
</form>