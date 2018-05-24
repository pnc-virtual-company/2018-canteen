<?php 

defined('BASEPATH') or exit('bad request!');
/**
* 
*/
// In codeigniter or php if we create class it must be the same bewteen class and function.
// More in formation if you wnat to your controller you must followed that point : Localhost/projectnaem/index.php/controller_naem/file controller that you want to print it out
class addDishs extends  CI_Model
	{
	 
	function m_insert_dish($dishName,$imageName,$dishDate,$dishDescription){

		$data = array(
			'dish_name'=>$dishName,
			'dish_image' => $imageName,
			'dish_date'=>$dishDate,
			'dish_description'=>$dishDescription,
			);
		$result = $this->db->insert("tbl_dishes",$data);
		return $result;
	}
	
}
